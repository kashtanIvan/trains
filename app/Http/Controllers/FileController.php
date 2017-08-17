<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{
    //
    public function index(){
        $allTrains = $this->_trainService->getAllTrains();
//        dd($allTrains->toArray());
        return view('ajax')->with(['trains' => $allTrains]);
//        $d = Category::with('file')
        $d = File::with('cat')//->whereHas('cat', function($query){
//            $query->where('categorys.cat_id', '=', 'file,type_cat');
//            dd($query->toSql());
//        })
            ->get();
//        $d = File::with('ca')->get();
        dd($d->toArray());
    }

    public function ajax(Request $request){
        if($request->ajax()) {
            $data = Input::all();
            $train = $this->_trainService->getTrain($data);
            print_r($data);
            if(empty($data['s'])){
                return 1;
            }
//            return $data;
        }
//        dd('ok');
//        return $d;
        $f = $allTrains = $this->_trainService->getAllTrains();
       return view('postajax')->with(['trains' => $train]);
//        dd($returnHTML);
        return response()->json( view('welcome') );
        return 1;
    }
}
