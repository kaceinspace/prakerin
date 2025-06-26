@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <!-- Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
        <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/backend/images/svgs/icon-user-male.svg') }}" width="50" height="50"
                            class="mb-3" alt="icon" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Users</p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $totalUsers }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/backend/images/svgs/icon-mailbox.svg') }}" width="50" height="50"
                            class="mb-3" alt="icon" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Categories</p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $totalCategories }}</h5>
                    </div>
                </div>
            </div>
        </div>



        <div class="item">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/backend/images/svgs/icon-briefcase.svg') }}" width="50" height="50"
                            class="mb-3" alt="icon" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Orders</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $totalOrders }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/backend/images/svgs/icon-mailbox.svg') }}" width="50" height="50"
                            class="mb-3" alt="icon" />
                        <p class="fw-semibold fs-3 text-info mb-1">Products</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $totalProducts }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/backend/images/svgs/icon-wallet.svg') }}" width="50" height="50"
                            class="mb-3" alt="icon" />
                        <p class="fw-semibold fs-3 text-info mb-1">Total Revenue </p>
                        <h5 class="fw-semibold text-info mb-0">Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <form method="GET" class="row g-3 my-4">
        <div class="col-auto">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="success" {{ request('status')==='success' ? 'selected' : '' }}>Success</option>
                <option value="pending" {{ request('status')==='pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancel" {{ request('status')==='cancel' ? 'selected' : '' }}>Cancel</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="year" class="form-select" onchange="this.form.submit()">
                @foreach ($availableYears as $y)
                <option value="{{ $y }}" {{ request('year')==$y ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Chart Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Pendapatan Bulanan ({{ ucfirst($status) }}) - {{ $year }}</div>
                <div class="card-body">
                    <div id="chartRevenue"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Penjualan Produk per Bulan - {{ $year }}</div>
                <div class="card-body">
                    <div id="chartSales"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const revenueChart = new ApexCharts(document.querySelector("#chartRevenue"), {
    chart: { type: 'bar', height: 300 },
    series: [{ name: 'Revenue', data: @json($monthlyRevenueData) }],
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] },
    colors: ['#3b82f6']
});
revenueChart.render();

const salesChart = new ApexCharts(document.querySelector("#chartSales"), {
    chart: { type: 'area', height: 300 },
    series: [{ name: 'Produk Terjual', data: @json($monthlyProductSales) }],
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] },
    colors: ['#10b981']
});
salesChart.render();
</script>
@endpush