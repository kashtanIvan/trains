<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStage extends Model
{
    public $table = 'productStage';
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
