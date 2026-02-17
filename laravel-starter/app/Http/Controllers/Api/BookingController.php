<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request): JsonResponse
    {
        $payload = $request->validated();
        $service = Service::findOrFail($payload['service_id']);

        $startAt = now()->parse($payload['start_at']);
        $endAt = (clone $startAt)->addMinutes($service->duration_minutes);

        return DB::transaction(function () use ($payload, $startAt, $endAt) {
            $hasConflict = Booking::query()
                ->where('organization_id', $payload['organization_id'])
                ->whereIn('status', ['confirmed', 'in_progress'])
                ->where(function ($query) use ($startAt, $endAt) {
                    $query->whereBetween('start_at', [$startAt, $endAt])
                        ->orWhereBetween('end_at', [$startAt, $endAt])
                        ->orWhere(function ($inner) use ($startAt, $endAt) {
                            $inner->where('start_at', '<=', $startAt)
                                ->where('end_at', '>=', $endAt);
                        });
                })
                ->lockForUpdate()
                ->exists();

            if ($hasConflict) {
                return response()->json([
                    'message' => 'Selected slot is already booked.',
                ], 422);
            }

            $booking = Booking::create([
                'organization_id' => $payload['organization_id'],
                'customer_id' => $payload['customer_id'],
                'service_id' => $payload['service_id'],
                'start_at' => $startAt,
                'end_at' => $endAt,
                'status' => 'confirmed',
                'notes' => $payload['notes'] ?? null,
            ]);

            return response()->json($booking, 201);
        });
    }
}
