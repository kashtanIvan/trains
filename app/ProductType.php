<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $table = 'orders';

    public function product()
    {
        return $this->belongsToMany('App\Product', 'type_id');
    }
}
