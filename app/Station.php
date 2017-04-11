<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations';

    protected $fillable = [
        'station_name',
        'order',
    ];

    public $rules = [
        'station_name' => 'required|max:255',
    ];

    public function train()
    {
        return $this->belongsToMany('App\Train', 'train_station')->withPivot('time');
    }

}
