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
            [   'email' => 'kot6@mail.ru',
                'name' => 'Толстых В.К.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot2@mail.ru',
                'name' => 'Ермоленко Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot3@mail.ru',
                'name' => 'Шарий Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot4@mail.ru',
                'name' => 'Бондаренко В.И.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot5@mail.ru',
                'name' => 'Бондаренко В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot@mail.ru',
                'name' => 'Котенко В.Н.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot7@mail.ru',
                'name' => 'Котенко Ю.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot8@mail.ru',
                'name' => 'Бодряга В.Е.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot10@mail.ru',
                'name' => 'Бодряга В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot11@mail.ru',
                'name' => 'Володин Н.А.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            [   'email' => 'kot12@mail.ru',
                'name' => 'Мартыненко А.М.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
