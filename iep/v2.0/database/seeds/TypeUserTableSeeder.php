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
		DB::table('type_users')->insert([
			'caption' => 'Заведующий отделением'
		]);
		
		DB::table('type_users')->insert([
			'caption' => 'Преподаватель'
		]);
		
		DB::table('type_users')->insert([
			'caption' => 'Студент'
		]);
		
		DB::table('type_users')->insert([
			'caption' => 'Староста'
		]);
		
		DB::table('type_users')->insert([
			'caption' => 'Родитель'
		]);
		
		DB::table('type_users')->insert([
			'caption' => 'Администратор'
		]);
    }
}
