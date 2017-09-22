<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableTree extends Model
{
    protected $table = 'tableotrees';
    protected $fillable = [
        'id',
        'id_one',
        'id_two',
        'name'
    ];

    public function tableone(){
        return $this->belongsTo('App\TableOne', 'id_one', 'id');
    }
    public function tabletwo(){
        return $this->belongsTo('App\TableTwo', 'id_two', 'id');
    }
}
