<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            'second_name'  => "admin",
            'first_name'   => "admin",
            'patronymic'   => "admin",
            'email'        => "admin@edukit.ru",
            'password'     => bcrypt("admin"),
            'id_type_user' => 6,
		]);
    }
}
