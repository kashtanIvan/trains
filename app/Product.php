<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    public $fillable = [
        'name',
        'type_id'
    ];

    public function order(){
        return $this->belongsToMany('App\Order', 'prod_orders', 'product_id', 'order_id');
    }
}
