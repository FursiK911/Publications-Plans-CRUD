<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [   'name' => 'Владислав',
                'last_name' => 'Котенко',
                'middle_name' => 'Николаевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор',
                'last_name' => 'Толстых',
                'middle_name' => 'Константинович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Татьяна',
                'last_name' => 'Ермоленко',
                'middle_name' => 'Владимировна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Тимофей',
                'last_name' => 'Шарий',
                'middle_name' => 'Вячеславович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виталий',
                'last_name' => 'Бондаренко',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктория',
                'last_name' => 'Бондаренко',
                'middle_name' => 'Витальевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Юлия',
                'last_name' => 'Котенко',
                'middle_name' => 'Владиславовна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Вероника',
                'last_name' => 'Бодряга',
                'middle_name' => 'Евгеньевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор',
                'last_name' => 'Бодряга',
                'middle_name' => 'Викторович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Николай',
                'last_name' => 'Володин',
                'middle_name' => 'Александроаич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Анастасия',
                'last_name' => 'Мартыненко',
                'middle_name' => 'Михайловна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ]);
    }
}
