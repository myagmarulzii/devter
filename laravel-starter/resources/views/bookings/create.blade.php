@extends('layouts.app')

@section('content')
    <h1>Цаг захиалга</h1>
    <form method="POST" action="/api/bookings">
        @csrf

        <label>Байгууллага ID</label>
        <input name="organization_id" type="number" required>

        <label>Үйлчлүүлэгч ID</label>
        <input name="customer_id" type="number" required>

        <label>Үйлчилгээ ID</label>
        <input name="service_id" type="number" required>

        <label>Эхлэх цаг</label>
        <input name="start_at" type="datetime-local" required>

        <label>Тэмдэглэл</label>
        <textarea name="notes" rows="3"></textarea>

        <button class="btn" type="submit">Захиалга үүсгэх</button>
    </form>
@endsection
