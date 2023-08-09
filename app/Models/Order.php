<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'town_country',
        'address_detail',
        'payment_type',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
}
