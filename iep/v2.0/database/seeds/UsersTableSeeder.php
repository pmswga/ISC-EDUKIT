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
		DB::table('IEPAccount')->insert([
            'second_name'  => "admin",
            'first_name'   => "admin",
            'patronymic'   => "admin",
            'email'        => "admin@edukit.ru",
            'passwd'     => bcrypt("admin"),
            'id_account_type' => 6,
		]);

		DB::table('IEPAccount')->insert([
            'second_name'  => "Гусева",
            'first_name'   => "Елена",
            'patronymic'   => "Львовна",
            'email'        => "guseva@edukit.ru",
            'passwd'     => bcrypt("password"),
            'id_account_type' => 1,
		]);
    }
}
