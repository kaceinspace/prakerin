@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <form action="{{ route('backend.coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header bg-secondary">
                Edit Coupon
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Kupon</label>
                    <input type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Diskon (%)</label>
                    <input type="number" name="discount" class="form-control" value="{{ $coupon->discount }}" required>
                </div>
                <div class="mb-3">
                    <label for="valid_until" class="form-label">Masa Berlaku</label>
                    <input type="date" name="valid_until" class="form-control" value="{{ $coupon->valid_until }}" required>
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ $coupon->is_active ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$coupon->is_active ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
