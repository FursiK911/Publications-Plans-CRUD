<?php

use Illuminate\Database\Seeder;

class UsersAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_authors')->insert([
            ['author_id' => '1', 'user_id' => '1'],
            ['author_id' => '2', 'user_id' => '2'],
            ['author_id' => '3', 'user_id' => '3'],
            ['author_id' => '4', 'user_id' => '4'],
            ['author_id' => '5', 'user_id' => '5'],
            ['author_id' => '6', 'user_id' => '6'],
            ['author_id' => '7', 'user_id' => '7'],
            ['author_id' => '8', 'user_id' => '8'],
            ['author_id' => '9', 'user_id' => '9'],
            ['author_id' => '10', 'user_id' => '10'],
            ['author_id' => '11', 'user_id' => '11'],
        ]);
    }
}
