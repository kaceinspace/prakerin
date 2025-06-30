<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'order_code',
        'status',
        'tracking_number',
        'shipped_at',
        'shipping_status',
    ];

    protected $casts = [
        'shipped_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi many to many dengan Product
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'price')
            ->withTimestamps();
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shippingLog()
    {
        return $this->hasOne(ShippingLog::class);
    }

}
