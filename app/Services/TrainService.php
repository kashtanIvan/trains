<?php

namespace App\Services;

use App\Train;
use Illuminate\Support\Facades\DB;


class TrainService
{

    public function getAllTrains()
    {
        return DB::table('trains')
            ->join('routes', 'trains.id', '=', 'routes.train_id')
            ->get()
            ->groupBy('train_id');
    }

}