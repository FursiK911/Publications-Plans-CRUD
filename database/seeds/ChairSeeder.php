<?php

use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chairs')->insert([
            ['name_of_chair' => 'None'],
            ['name_of_chair' => 'Информатики и вычислительной техники'],
            ['name_of_chair' => 'Нанотехнологии'],
            ['name_of_chair' => 'Радиофизики'],
            ['name_of_chair' => 'Общей физики'],
            ['name_of_chair' => 'Компьютерных технологий'],
            ['name_of_chair' => 'Математической физики'],
        ]);
    }
}
