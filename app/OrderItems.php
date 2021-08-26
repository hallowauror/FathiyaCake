<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $guarded = [];

    public function products() {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function order() {
        return $this->hasOne(Order::class,'id','order_id');
    }
}
