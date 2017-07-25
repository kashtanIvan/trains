<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'name',
        'type_cat',
    ];

    public function cat(){
        return $this->belongsTo('App\Category', 'type_cat', 'cat_id');
    }

    public function ca(){
        return $this->belongsTo('App\Category', 'id');
    }
}
