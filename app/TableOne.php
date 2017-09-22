<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableOne extends Model
{
    protected $table = 'tableones';
    protected $fillable = [
        'id',
        'name'
    ];

    public function tabletwo(){
        return $this->hasOne('App\TableTwo', 'id_one');
    }
    public function tabletree(){
        return $this->hasMany('App\TableTree', 'id_one');
    }
}
