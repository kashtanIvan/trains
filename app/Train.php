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

    public function route(){
        return $this->hasOne('App\Route');
    }
}
