<?php

use Illuminate\Database\Seeder;

class PaperSizesSeeder extends Seeder
{
    public function run()
    {
        DB::table('papers_sizes')->insert([
            ['format_name' => 'A4'],
            ['format_name' => 'A5']
        ]);
    }
}
