@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-4">
                    <h3 class="mb-3">Pembayaran Order</h3>

                    <ul class="list-group mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Kode Order</strong>
                            <span>{{ $order->order_code }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Total Harga</strong>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status</strong>
                            <span class="badge bg-warning text-dark">Pending</span>
                        </li>
                    </ul>

                    <button id="pay-button" class="btn btn-primary btn-lg w-100 rounded-pill">
                        Bayar Sekarang
                    </button>

                    <a href="{{ route('orders.index') }}" class="btn btn-link d-block text-center mt-3">
                        Batal & kembali ke daftar order
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                console.log(result);
                window.location.href = "{{ route('orders.index') }}";
            }
            , onPending: function(result) {
                alert("Menunggu pembayaran...");
                console.log(result);
                window.location.href = "{{ route('orders.index') }}";
            }
            , onError: function(result) {
                alert("Pembayaran gagal!");
                console.log(result);
            }
        });
    });

</script>
@endsection
