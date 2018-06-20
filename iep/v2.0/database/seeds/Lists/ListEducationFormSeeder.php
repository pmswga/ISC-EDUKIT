<?php

use Illuminate\Database\Seeder;

class ListEducationFormSeeder extends Seeder
{
    public function run()
    {
        DB::table('ListEducationForm')->insert([
            [
                'description' => 'Очная'
            ],
            [
                'description' => 'Очно-заочная'
            ],
            [
                'description' => 'Заочная'
            ],
        ]);
    }
}
