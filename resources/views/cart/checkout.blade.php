<h2>Checkout</h2>
<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->qty }}</td>
            <td>Rp {{ number_format($item->product->price * $item->qty) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h4>Total: Rp {{ number_format($total) }}</h4>

<form action="{{ route('checkout.submit') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
</form>
