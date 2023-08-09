<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sub_category_id',
        'image',
        'quantity',
        'discount_price',
        'status',
    ];

    public function sub_category() {
        return $this->belongsTo(SubCategory::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
}
