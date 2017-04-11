<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainStation extends Model
{
    //
    protected $table = 'train_station';

    public $timestamps = false;

    protected $fillable = [
        'train_id',
        'station_id',
        'time'
    ];


}
