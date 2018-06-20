<?php

use Illuminate\Database\Seeder;

class ListAccountTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('ListAccountType')->insert([
            [
                'description' => 'Заведующий отделением'
            ],
            [
                'description' => 'Преподаватель'
            ],
            [
                'description' => 'Студент'
            ],
            [
                'description' => 'Староста'
            ],
            [
                'description' => 'Родитель'
            ],
            [
                'description' => 'Администратор'
            ]
        ]);
    }
}
