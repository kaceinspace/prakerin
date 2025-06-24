@extends('layouts.backend')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Order</h5>
            </div>

            <div class="card-body">

                <!-- Informasi Pemesan -->
                <div class="mb-4">
                    <h6 class="text-uppercase fw-bold text-muted mb-3">Informasi Pemesan</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded p-3 bg-light">
                                <strong>Nama:</strong><br>{{ $order->user->name }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 bg-light">
                                <strong>Email:</strong><br>{{ $order->user->email }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 bg-light">
                                <strong>Tanggal Order:</strong><br>{{ $order->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 bg-light">
                                <strong>Kode Order:</strong><br>#{{ $order->order_code }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 bg-light">
                                <strong>Status:</strong><br>
                                <span
                                    class="badge 
                                {{ $order->status == 'pending'
                                    ? 'bg-warning text-dark'
                                    : ($order->status == 'success'
                                        ? 'bg-success'
                                        : 'bg-danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Daftar Produk -->
                <div class="mb-4">
                    <h6 class="text-uppercase fw-bold text-muted mb-3">Daftar Produk</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp {{ number_format($item->pivot->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->pivot->qty }}</td>
                                        <td>Rp {{ number_format($item->pivot->qty * $item->pivot->price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="fw-bold">
                                    <td colspan="4" class="text-end">Total:</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ubah Status -->
                <div class="mb-4">
                    <h6 class="text-uppercase fw-bold text-muted mb-3">Ubah Status Order</h6>
                    <form action="{{ route('backend.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-2">
                            <div class="col-md-10">
                                <select name="status" class="form-select" required>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Success
                                    </option>
                                    <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2 d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Back Button -->
                <a href="{{ route('backend.orders.index') }}" class="btn btn-secondary">
                    ← Kembali ke Daftar Pesanan
                </a>

            </div>
        </div>

    </div>
@endsection
