@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Order Report</h5>
        </div>
        <div class="card-body">
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-2">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-select" onchange="this.form.submit()">
                        @foreach ($availableYears as $y)
                        <option value="{{ $y }}" {{ $year==$y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="all" {{ $status=='all' ? 'selected' : '' }}>All</option>
                        <option value="pending" {{ $status=='pending' ? 'selected' : '' }}>Pending</option>
                        <option value="cancel" {{ $status=='cancel' ? 'selected' : '' }}>Cancel</option>
                        <option value="success" {{ $status=='success' ? 'selected' : '' }}>Success</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end gap-2">
                    <a href="{{ route('backend.report.export.excel', request()->all()) }}"
                        class="btn btn-success">Export Excel</a>
                    <a href="{{ route('backend.report.export.pdf', request()->all()) }}" class="btn btn-danger">Export
                        PDF</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Order Code</th>
                            <th>User</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-{{
                                    $order->status === 'success' ? 'success' :
                                    ($order->status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection