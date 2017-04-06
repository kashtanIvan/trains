<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    protected $fillable = [
        'id_train',
        'station_name',
        'order',
    ];

    public function train()
    {
        return $this->belongsTo('App\Train');
    }

}
