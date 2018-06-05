<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => 'Установка IEP',
            'content' => 'Развёртывание информационно-образовательного портала прошла успешно',
            'id_author' => 1,
            'publication_date' => date('Y-m-d'),
        ]);
    }
}
