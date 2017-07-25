<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = [
        'cat_id',
        'category',
    ];

    public function file(){
        return $this->hasOne('App\File', 'cat_id');
    }
    public function fi(){
        return $this->hasMany('App\File', 'id');
    }
}
