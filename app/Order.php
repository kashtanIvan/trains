<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';
    public $fillable = [
        'product_id',
        'client_name',
        'order_status_id'
    ];
    public function product(){
        return $this->belongsToMany('App\Product', 'prod_orders', 'product_id', 'order_id');
    }
}
