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
            [   'email' => 'tolstyh@mail.ru',
                'name' => 'Толстых В.К.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'ermolenko@mail.ru',
                'name' => 'Ермоленко Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'shariy@mail.ru',
                'name' => 'Шарий Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'bondarenkoVI@mail.ru',
                'name' => 'Бондаренко В.И.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'bondarenkoVV@mail.ru',
                'name' => 'Бондаренко В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kotenkoVN@mail.ru',
                'name' => 'Котенко В.Н.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kotenkoYV@mail.ru',
                'name' => 'Котенко Ю.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'bodryagaVE@mail.ru',
                'name' => 'Бодряга В.Е.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'bodryagaVV@mail.ru',
                'name' => 'Бодряга В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'volodin@mail.ru',
                'name' => 'Володин Н.А.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'martinenko@mail.ru',
                'name' => 'Мартыненко А.М.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
