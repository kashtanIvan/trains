<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableTwo extends Model
{

    protected $table = 'tableotwos';
    protected $fillable = [
        'id',
        'id_one',
        'name'
    ];


    public function tableone(){
        return $this->belongsTo('App\TableOne', 'id');
    }
    public function tabletree(){
        return $this->hasMany('App\TableTree', 'id_two');
    }
}
