<?php

use Illuminate\Database\Seeder;

class CoversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covers')->insert([
            ['cover_type' => 'Мягкая'],
            ['cover_type' => 'Твердая']
        ]);
    }
}
