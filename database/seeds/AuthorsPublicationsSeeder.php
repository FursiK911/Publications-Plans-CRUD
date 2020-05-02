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
            ['author_id' => '6', 'plan_id' => '1'],
            ['author_id' => '7', 'plan_id' => '1'],
            ['author_id' => '6', 'plan_id' => '2'],
            ['author_id' => '7', 'plan_id' => '2'],
            ['author_id' => '11', 'plan_id' => '3'],
            ['author_id' => '4', 'plan_id' => '4'],
            ['author_id' => '5', 'plan_id' => '4'],
        ]);
    }
}
