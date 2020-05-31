<?php

use Illuminate\Database\Seeder;

class AuthorsPublicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors_publications')->insert([
            ['author_id' => '1', 'plan_id' => '1'],
            ['author_id' => '7', 'plan_id' => '1'],
            ['author_id' => '6', 'plan_id' => '2'],
            ['author_id' => '7', 'plan_id' => '2'],
            ['author_id' => '11', 'plan_id' => '3'],
            ['author_id' => '4', 'plan_id' => '4'],
            ['author_id' => '5', 'plan_id' => '4'],
            ['author_id' => '23', 'plan_id' => '5'],
            ['author_id' => '25', 'plan_id' => '5'],
            ['author_id' => '24', 'plan_id' => '5'],
            ['author_id' => '25', 'plan_id' => '6'],
            ['author_id' => '23', 'plan_id' => '6'],
            ['author_id' => '24', 'plan_id' => '6'],
            ['author_id' => '26', 'plan_id' => '6'],
            ['author_id' => '27', 'plan_id' => '6'],
            ['author_id' => '29', 'plan_id' => '6'],
            ['author_id' => '1', 'plan_id' => '7'],
            ['author_id' => '7', 'plan_id' => '7'],
            ['author_id' => '1', 'plan_id' => '8'],
            ['author_id' => '7', 'plan_id' => '8'],
            ['author_id' => '8', 'plan_id' => '9'],
            ['author_id' => '9', 'plan_id' => '9'],
            ['author_id' => '51', 'plan_id' => '10'],
            ['author_id' => '39', 'plan_id' => '11'],
            ['author_id' => '49', 'plan_id' => '11'],
            ['author_id' => '50', 'plan_id' => '11'],
            ['author_id' => '39', 'plan_id' => '12'],
            ['author_id' => '41', 'plan_id' => '12'],
            ['author_id' => '49', 'plan_id' => '12'],
            ['author_id' => '39', 'plan_id' => '13'],
            ['author_id' => '41', 'plan_id' => '13'],
            ['author_id' => '49', 'plan_id' => '13'],
            ['author_id' => '39', 'plan_id' => '14'],
            ['author_id' => '40', 'plan_id' => '14'],
            ['author_id' => '49', 'plan_id' => '14'],
            ['author_id' => '39', 'plan_id' => '15'],
            ['author_id' => '49', 'plan_id' => '15'],
            ['author_id' => '39', 'plan_id' => '16'],
            ['author_id' => '41', 'plan_id' => '16'],
            ['author_id' => '39', 'plan_id' => '17'],
            ['author_id' => '40', 'plan_id' => '17'],
            ['author_id' => '49', 'plan_id' => '17'],
            ['author_id' => '39', 'plan_id' => '18'],
            ['author_id' => '40', 'plan_id' => '18'],
            ['author_id' => '41', 'plan_id' => '18'],
            ['author_id' => '39', 'plan_id' => '19'],
            ['author_id' => '41', 'plan_id' => '19'],
            ['author_id' => '39', 'plan_id' => '20'],
            ['author_id' => '41', 'plan_id' => '20'],
        ]);
    }
}
