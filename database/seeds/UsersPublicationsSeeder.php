<?php

use Illuminate\Database\Seeder;

class UsersPublicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_publications')->insert([
            ['user_id' => '6', 'plan_id' => '1'],
            ['user_id' => '7', 'plan_id' => '1'],
            ['user_id' => '6', 'plan_id' => '2'],
            ['user_id' => '7', 'plan_id' => '2'],
            ['user_id' => '11', 'plan_id' => '3'],
            ['user_id' => '4', 'plan_id' => '4'],
            ['user_id' => '5', 'plan_id' => '4'],
        ]);
    }
}
