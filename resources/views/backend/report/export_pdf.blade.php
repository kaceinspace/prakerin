<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Order Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .logo {
            width: 150px;
        }

        .company-info {
            text-align: right;
            font-size: 13px;
        }

        .title {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 6px 5px;
        }

        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/logo.png') }}" class="logo" alt="Logo">
        <div class="company-info">
            <strong>Assalaam Studio</strong><br>
            Jl. Situtarate Terusan Cibaduyut, Bandung<br>
            Telp: (022) 543220 220 | Email: info@assalaamstd.com
        </div>
    </div>

    <div class="title">Order Report</div>
    <p class="subtitle">
        Periode:
        {{ request('start_date') ? \Carbon\Carbon::parse(request('start_date'))->format('d M Y') : 'Semua' }}
        -
        {{ request('end_date') ? \Carbon\Carbon::parse(request('end_date'))->format('d M Y') : 'Semua' }}
        |
        Status: {{ ucfirst(request('status') ?? 'All') }}
    </p>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="15%">Order Code</th>
                <th width="25%">User</th>
                <th width="15%">Total Price</th>
                <th width="10%">Status</th>
                <th width="15%">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $order->order_code }}</td>
                <td>{{ $order->user->name }}</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No data available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
    </div>
</body>

</html>