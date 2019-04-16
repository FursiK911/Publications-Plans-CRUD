<?php

use Illuminate\Database\Seeder;

class PaperSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('papers_sizes')->insert([
            ['format_name' => 'A4'],
            ['format_name' => 'A5']
        ]);
    }
}
