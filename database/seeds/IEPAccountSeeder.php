<?php

use Illuminate\Database\Seeder;

class IEPAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('IEPAccount')->insert([
            'second_name'     => 'admin',
            'first_name'      => 'admin',
            'patronymic'      => 'admin',
            'email'           => 'admin@admin.ru',
            'password'        => bcrypt('admin'),
            'id_account_type' => 6,
        ]);
    }
}
