<?php

use Illuminate\Database\Seeder;

class ListAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ListAccountType')->insert([
            'description' => 'Заведующий отделением'
        ]);
        DB::table('ListAccountType')->insert([
            'description' => 'Преподаватель'
        ]);
        DB::table('ListAccountType')->insert([
            'description' => 'Студент'
        ]);
        DB::table('ListAccountType')->insert([
            'description' => 'Староста'
        ]);
        DB::table('ListAccountType')->insert([
            'description' => 'Родитель'
        ]);
        DB::table('ListAccountType')->insert([
            'description' => 'Администратор'
        ]);
    }
}
