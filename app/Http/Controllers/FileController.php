<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function index(){
//        $d = Category::with('file')
        $d = File::with('cat')//->whereHas('cat', function($query){
//            $query->where('categorys.cat_id', '=', 'file,type_cat');
//            dd($query->toSql());
//        })
            ->get();
//        $d = File::with('ca')->get();
        dd($d->toArray());
    }
}
