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

        $stations = [
            [
                'station_name' => 'Станция 1',
                'order' => 0,
            ],
            [

                'station_name' => 'Станция 2',
                'order' => 1,
            ],

        ];

        $train = App\Train::create($train);
        $stations = App\Station::insert($stations);

        $train = [
            'name' => 'Train 2',
            'schedule' => 'сб-вс',
        ];
        $train = App\Train::create($train);

        $tS = [
            [
                'train_id' => 2,
                'station_id' => 1,
            ],
            [
                'train_id' => 1,
                'station_id' => 2,
            ],
        ];
        DB::table('train_station')->insert($tS);

    }
}
