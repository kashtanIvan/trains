<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddTrainController extends Controller
{
    //
    public function index()
    {
        return view('add')->with([
            'errors' => false
        ]);
    }

    public function addTrain(Request $request)
    {
        $res = $this->_trainService->addTrain($request->all());
        if (!$res) {
            return redirect()->route('index');
        } else {
            return view('add')->with([
                'errors' => true
            ]);
        }
    }
}
