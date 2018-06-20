<?php

use Illuminate\Database\Seeder;

class ListEducationPayFormSeeder extends Seeder
{
    public function run()
    {
        DB::table('ListEducationPayForm')->insert([
            [
                'description' => 'Не установлена'
            ],
            [
                'description' => 'Бюджетная'
            ],
            [
                'description' => 'Коммерческая'
            ]
        ]);
    }
}
