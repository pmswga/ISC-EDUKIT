<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ListEducationFormSeeder::class,
            ListEducationPayFormSeeder::class,
            ListFeedbackTypeSeeder::class,
            ListEducationPairSeeder::class,
            ListEducationDaySeeder::class,
            ListRelationTypeSeeder::class,
            ListAccountTypeSeeder::class,
            IEPAccountSeeder::class,
        ]);
    }
}
