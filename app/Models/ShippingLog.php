<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingLog extends Model
{
    protected $fillable = ['order_id', 'courier', 'service', 'cost', 'etd'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
