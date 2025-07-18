<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Midtrans\Snap;

class PaymentController extends Controller
{

    public function pay(Order $order)
    {
        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_code,
                'gross_amount' => $order->total_price,
            ],
            'customer_details'    => [
                'first_name' => $order->user->name,
                'email'      => $order->user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payments.pay', compact('snapToken', 'order'));
    }

}
