<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Ермоленко Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Шарий Т.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Бондаренко В.И.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Бондаренко В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Котенко В.Н.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Котенко Ю.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Бодряга В.Е.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Бодряга В.В.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Володин Н.А.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Мартыненко А.М.',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}
