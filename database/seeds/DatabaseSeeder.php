<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CoversSeeder::class,
            PapersSizesSeeder::class,
            MonthOfSubmissionsSeeder::class,
            TypeOfPublicationSeeder::class,
            UsersSeeder::class,
            DisciplinesSeeder::class,
            PublicationPlanSeeder::class,
            UsersPublicationsSeeder::class
        ]);
    }
}
