<?php

use Illuminate\Database\Seeder;

class ListEducationDaySeeder extends Seeder
{
    public function run()
    {
        DB::table('ListEducationDay')->insert([
            [
                'full_caption' => 'Понедельник',
                'short_caption' => 'ПН',
            ],
            [
                'full_caption' => 'Вторник',
                'short_caption' => 'ВТ',
            ],
            [
                'full_caption' => 'Среда',
                'short_caption' => 'СР',
            ],
            [
                'full_caption' => 'Четверг',
                'short_caption' => 'ЧТ',
            ],
            [
                'full_caption' => 'Пятница',
                'short_caption' => 'ПТ',
            ],
            [
                'full_caption' => 'Суббота',
                'short_caption' => 'СБ',
            ],
        ]);
    }
}
