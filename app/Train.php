<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{

    protected $table = 'trains';

    protected $fillable = [
        'name',
        'schedule',
    ];

    public $rules = [
        'name' => 'required|unique:trains|max:255',
    ];

    public function station(){
        return $this->belongsToMany('App\Station', 'train_station')->withPivot('time');
    }
}
