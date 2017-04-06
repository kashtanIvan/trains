<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $train = [
            'name' => 'Train 1',
            'schedule' => 'пн-пт',
        ];

        $route = [

                'station_name' => 'Станция 1',
                'order' => 0,
                'id_train' => 1,
        ];

        $train = App\Train::create($train);
        $route = App\Route::create($route);

        $route = [

            'station_name' => 'Станция 2',
            'order' => 1,
            'id_train' => 1,

        ];
        $route = App\Route::create($route);

        $route =[
            'station_name' => 'Станция 3',
            'order' => 2,
            'id_train' => 1,

        ];
        $route = App\Route::create($route);

        $route = [
            'station_name' => 'Станция 4',
            'order' => 3,
            'id_train' => 1,
        ];
        $route = App\Route::create($route);
    }
}
