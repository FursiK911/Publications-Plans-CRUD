<?php

use Illuminate\Database\Seeder;

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
            ['name' => 'Толстых В.К.',
                'password' => bcrypt('secret')],
            ['name' => 'Ермоленко Т.В.',
                'password' => bcrypt('secret')],
            ['name' => 'Шарий Т.В.',
                'password' => bcrypt('secret')],
            ['name' => 'Бондаренко В.И.',
                'password' => bcrypt('secret')],
            ['name' => 'Бондаренко В.В.',
                'password' => bcrypt('secret')],
            ['name' => 'Котенко В.Н.',
                'password' => bcrypt('secret')],
            ['name' => 'Котенко Ю.В.',
                'password' => bcrypt('secret')],
            ['name' => 'Бодряга В.Е.',
                'password' => bcrypt('secret')],
            ['name' => 'Бодряга В.В.',
                'password' => bcrypt('secret')],
            ['name' => 'Володин Н.А.',
                'password' => bcrypt('secret')],
            ['name' => 'Мартыненко А.М.',
                'password' => bcrypt('secret')]
        ]);
    }
}
