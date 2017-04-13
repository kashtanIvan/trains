<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;

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

    /**
     * Удаление поезда с расписания
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $trainById = Train::find($id);
        if ($trainById) {
            $stationById = $trainById->station()->get();
            $tS = $stationById->first()->pivot;
            $trainById->delete();
            $tS->delete();
            session()->flash('delete', 'Запись удалена');
        } else {
            session()->flash('delete', 'Ошибка удаления');
        }
        return redirect()->back();
    }
}
