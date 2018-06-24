<?php

use Illuminate\Database\Seeder;

class ListFeedbackTypeSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('ListFeedbackType')->insert([
            [
                'description' => 'Вопрос',
            ],
            [
                'description' => 'Предложение',
            ],
        ]);
    }
}
