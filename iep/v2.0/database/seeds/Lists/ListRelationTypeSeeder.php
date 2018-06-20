<?php

use Illuminate\Database\Seeder;

class ListRelationTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('ListRelationType')->insert([
            [
                'description' => 'Не установлен',
            ],
            [
                'description' => 'Мать',
            ],
            [
                'description' => 'Отец',
            ],
            [
                'description' => 'Бабушка',
            ],
            [
                'description' => 'Дедушка',
            ],
            [
                'description' => 'Тётя',
            ],
            [
                'description' => 'Дядя',
            ],
        ]);
    }
}
