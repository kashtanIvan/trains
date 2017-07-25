<?php

namespace App\Services;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TestService
{
    public function getTest(){
        $products = Product::with(['order' => function($query){
            $query->select('orders.id', 'client_name', 'order_status_id', 'date')
                ->where('date', '<', Carbon::now()->toDateString());
//            dd($query->toSql());
        }])->get();
        dd($products);
        dd('test');
    }
}