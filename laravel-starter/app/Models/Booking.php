<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'organization_id',
        'customer_id',
        'service_id',
        'start_at',
        'end_at',
        'status',
        'notes',
    ];
}
