<?php
namespace App\Services;

use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Transaction;

class MidtransService
{
    public function createTransaction(Order $order)
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
            'item_details'        => $order->products->map(function ($product) {
                return [
                    'id'       => $product->id,
                    'price'    => $product->pivot->price,
                    'quantity' => $product->pivot->qty,
                    'name'     => $product->name,
                ];
            })->toArray(),
        ];

        return Snap::getSnapToken($params);
    }

    public function checkTransactionStatus($orderCode)
    {
        return Transaction::status($orderCode);
    }
}
