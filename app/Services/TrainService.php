<?php

namespace App\Services;

use App\Station;
use App\Train;
use App\TrainStation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TrainService
{
    private $_validator = false;
    private $error = [];

    public function __construct()
    {
        $this->createValidator();
    }


    public function createValidator()
    {
        if (!$this->_validator) {
            $this->_validator = new Validator();
        }
        return $this->_validator;
    }

    /**
     * Получение расписания
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllTrains()
    {
        return Train::with(['station' => function ($query) {
            $query->orderBy('order', 'desc');
        }])->get();
    }

    /**
     * Получение всех станций
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllStation()
    {
        return Station::all();
    }

    /**
     * Получение расписания по выбраной станции
     * @param $stationId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTrain($stationId)
    {

        $e = Train::with('station')->whereHas('station', function($query) use ($stationId){
            $query->where('stations.id', '=', $stationId);
        })->get();
        return $e;
dd($e);
        $products = Product::with([
            'order' => function($query) {
                $query->select('id', 'client_name', 'date_ship_plan', 'order_status_id');
            },
            'productStage' => function($query) {
                $query->select('stage_status_id', 'stage_id', 'product_id');
            },
            'productType' => function($query) {
                $query->select('id', 'name');
            },
        ])
            ->whereHas('order', function ($query){
                $query->where('order_status_id', 2)
                    ->where('date_ship_plan', '<', Carbon::now()->toDateTimeString());
            })

            ->get([
                'product.id',
                'product.order_id',
                'product.number_client',
                'product.description',
                'product.note_production',
                'product.date_ready_product',
                'product.product_type_id',
            ]);
    }

    /**
     * Добавление поезда
     * @param $data
     * @return array|bool
     */
    public function AddTrain($data)
    {
        $nameTrain = $nameStation = $time = $day = false;

        $train = new Train();
        $station = new Station();

        if (array_key_exists('train', $data)) {

            $day = $this->dayGet($data['day']);
            $postTrain = [
                'name' => $data['train'],
                'schedule' => $day
            ];
            $validator = Validator::make($postTrain, $train->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $train = $train::create($postTrain);
            }
        }
        if (array_key_exists('station', $data) and empty($this->error)) {
            $postStation = [
                'station_name' => $data['station'],
                'order' => 2
            ];
//            dd($postStation);
            $validator = Validator::make($postStation, $station->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $station = $station::create($postStation);
//                dd($station->id);

            }
        }
        if (empty($this->error)) {
            $postTS = [
                'train_id' => $train->id,
                'station_id' => $station->id,
                'time' => $data['time']
            ];
//            dd($station->id);
            $tS = TrainStation::create($postTS);
//                dd($tS);
            return false;
        } else {
            return $this->error;
        }

    }

    /**
     * Отправление поезда по дням
     * @param $days
     * @return string
     */
    public function dayGet($days)
    {
        $resText = '';
        foreach ($days as $day) {
            switch ($day) {
                case 0:
                    $resText .= 'Пн.';
                    break;
                case 1:
                    $resText .= 'Вт.';
                    break;
                case 2:
                    $resText .= 'Ср.';
                    break;
                case 3:
                    $resText .= 'Чт.';
                    break;
                case 4:
                    $resText .= 'Пт.';
                    break;
                case 5:
                    $resText .= 'Сб.';
                    break;
                case 6:
                    $resText .= 'Вс';
                    break;
                case 7:
                    $resText = 'Ежедневно';
                    break;
            }
        }
        return $resText;
    }
}