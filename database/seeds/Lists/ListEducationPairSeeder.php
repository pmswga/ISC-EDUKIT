<?php

use Illuminate\Database\Seeder;

class ListEducationPairSeeder extends Seeder
{
    public function run()
    {
        DB::table('ListEducationPair')->insert([
            [
                'number' => 1,
                'time_start' => '8:30',
                'time_end' => '10:00',
            ],
            [
                'number' => 2,
                'time_start' => '10:10',
                'time_end' => '11:40',
            ],
            [
                'number' => 3,
                'time_start' => '11:50',
                'time_end' => '13:40',
            ],
            [
                'number' => 4,
                'time_start' => '13:50',
                'time_end' => '15:20',
            ],
            [
                'number' => 5,
                'time_start' => '15:30',
                'time_end' => '17:00',
            ],
            [
                'number' => 6,
                'time_start' => '17:10',
                'time_end' => '18:30',
            ],
            [
                'number' => 7,
                'time_start' => '18:35',
                'time_end' => '20:00',
            ],
        ]);
    }
}
