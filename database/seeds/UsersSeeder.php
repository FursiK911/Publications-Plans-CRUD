<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [   'email' => 'kotenkoVN@mail.ru',
                'name' => 'Владислав',
                'last_name' => 'Котенко',
                'middle_name' => 'Николаевич',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'tolstyh@mail.ru',
                'name' => 'Виктор',
                'last_name' => 'Толстых',
                'middle_name' => 'Константинович',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'ermolenko@mail.ru',
                'name' => 'Татьяна',
                'last_name' => 'Ермоленко',
                'middle_name' => 'Владимировна',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'shariy@mail.ru',
                'name' => 'Тимофей',
                'last_name' => 'Шарий',
                'middle_name' => 'Вячеславович',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'bondarenkoVI@mail.ru',
                'name' => 'Виталий',
                'last_name' => 'Бондаренко',
                'middle_name' => 'Иванович',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'bondarenkoVV@mail.ru',
                'name' => 'Виктория',
                'last_name' => 'Бондаренко',
                'middle_name' => 'Витальевна',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'kotenkoYV@mail.ru',
                'name' => 'Юлия',
                'last_name' => 'Котенко',
                'middle_name' => 'Владиславовна',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'bodryagaVE@mail.ru',
                'name' => 'Вероника',
                'last_name' => 'Бодряга',
                'middle_name' => 'Евгеньевна',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'bodryagaVV@mail.ru',
                'name' => 'Виктор',
                'last_name' => 'Бодряга',
                'middle_name' => 'Викторович',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'volodin@mail.ru',
                'name' => 'Николай',
                'last_name' => 'Володин',
                'middle_name' => 'Александроаич',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'email' => 'martinenko@mail.ru',
                'name' => 'Анастасия',
                'last_name' => 'Мартыненко',
                'middle_name' => 'Михайловна',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

        ]);

        $users = \App\User::all();
        foreach ($users as $user)
        {
            $user->assignRole('user');
        }
        $user = \App\User::find(1);
        $user->assignRole('administrator');
    }
}
