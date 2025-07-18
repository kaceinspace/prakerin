@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow rounded-4 border-0 mb-4">
                <div class="card-body p-4">
                    <h3 class="mb-3">Informasi Pengiriman</h3>

                    <form id="shipping-form" method="POST" action="{{ route('payment.process', $order->id) }}">
                        @csrf

                        {{-- Pilih Alamat --}}
                        <div class="mb-3">
                            <label for="address_id" class="form-label">Pilih Alamat</label>
                            <select name="address_id" id="address_id" class="form-select">
                                @foreach ($addresses as $address)
                                <option value="{{ $address->id }}">
                                    {{ $address->recipient_name }} - {{ $address->address_line }}, {{ $address->city }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pilih Kurir --}}
                        <div class="mb-3">
                            <label for="courier" class="form-label">Kurir</label>
                            <select name="courier" id="courier" class="form-select">
                                <option value="">Pilih kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
                        </div>

                        {{-- Pilih Layanan --}}
                        <div class="mb-3">
                            <label for="service" class="form-label">Layanan</label>
                            <select name="service" id="service" class="form-select">
                                <option value="">Pilih layanan</option>
                            </select>
                        </div>

                        {{-- Input Kupon --}}
                        <div class="mb-3">
                            <label for="coupon" class="form-label">Kode Kupon</label>
                            <input type="text" name="coupon" class="form-control" placeholder="Masukkan kode kupon">
                        </div>

                        <button type="submit" class="btn btn-success w-100 rounded-pill">
                            Hitung Total & Lanjut Pembayaran
                        </button>
                    </form>

                </div>
            </div>

            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-4">
                    <h3 class="mb-3">Order Info</h3>

                    <ul class="list-group mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Kode Order</strong>
                            <span>{{ $order->order_code }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Total Produk</strong>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status</strong>
                            <span class="badge bg-warning text-dark">Pending</span>
                        </li>
                    </ul>

                    {{-- Tombol ini muncul setelah alamat & kurir diproses --}}
                    @if(session('snap_token'))
                    <button id="pay-button" class="btn btn-primary btn-lg w-100 rounded-pill mt-3">
                        Bayar Sekarang
                    </button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script>
    var snapToken = "{{ session('snap_token') }}";
    if (snapToken) {
        document.getElementById('pay-button').addEventListener('click', function() {
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('orders.index') }}";
                }
                , onPending: function(result) {
                    alert("Menunggu pembayaran...");
                    window.location.href = "{{ route('orders.index') }}";
                }
                , onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                }
            });
        });
    }

    // Contoh Ajax untuk ambil layanan RajaOngkir
    document.getElementById('courier').addEventListener('change', function() {
        let courier = this.value;
        let address_id = document.getElementById('address_id').value;

        fetch(`/get-services?courier=${courier}&address_id=${address_id}`)
            .then(res => res.json())
            .then(data => {
                let serviceEl = document.getElementById('service');
                serviceEl.innerHTML = '';
                data.forEach(item => {
                    serviceEl.innerHTML += `<option value="${item.service}" data-cost="${item.cost}">
                        ${item.service} - Rp ${item.cost} (${item.etd} hari)
                    </option>`;
                });
            });
    });

</script>
@endsection
