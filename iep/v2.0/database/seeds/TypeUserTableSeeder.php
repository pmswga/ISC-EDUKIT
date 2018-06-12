<?php

use Illuminate\Database\Seeder;

class TypeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('ListAccountType')->insert([
			'caption' => 'Заведующий отделением'
		]);
		
		DB::table('ListAccountType')->insert([
			'caption' => 'Преподаватель'
		]);
		
		DB::table('ListAccountType')->insert([
			'caption' => 'Студент'
		]);
		
		DB::table('ListAccountType')->insert([
			'caption' => 'Староста'
		]);
		
		DB::table('ListAccountType')->insert([
			'caption' => 'Родитель'
		]);
		
		DB::table('ListAccountType')->insert([
			'caption' => 'Администратор'
		]);
    }
}
