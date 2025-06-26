<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Order Code</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->order_code }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>