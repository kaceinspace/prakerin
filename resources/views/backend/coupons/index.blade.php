@extends('layouts.backend')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <span>Data Kupon</span>
                    <a href="{{ route('backend.coupons.create') }}" class="btn btn-info btn-sm">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped" id="datacoupon">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kupon</th>
                                    <th>Tipe</th>
                                    <th>Nilai</th>
                                    <th>Masa Berlaku</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td class="text-capitalize">{{ $coupon->type }}</td>
                                    <td>
                                        @if ($coupon->type == 'fixed')
                                        Rp{{ number_format($coupon->value, 0, ',', '.') }}
                                        @else
                                        {{ $coupon->value }}%
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($coupon->start_date)->translatedFormat('d M Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($coupon->end_date)->translatedFormat('d M Y') }}
                                    </td>
                                    <td>
                                        <span class="badge {{ $coupon->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $coupon->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('backend.coupons.destroy', $coupon->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#datacoupon');

</script>
@endpush
