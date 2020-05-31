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
            [   'name' => 'Владислав', //1
                'last_name' => 'Котенко',
                'middle_name' => 'Николаевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор', //2
                'last_name' => 'Толстых',
                'middle_name' => 'Константинович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Татьяна', //3
                'last_name' => 'Ермоленко',
                'middle_name' => 'Владимировна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Тимофей', //4
                'last_name' => 'Шарий',
                'middle_name' => 'Вячеславович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виталий', //5
                'last_name' => 'Бондаренко',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктория',//6
                'last_name' => 'Бондаренко',
                'middle_name' => 'Витальевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Юлия',//7
                'last_name' => 'Котенко',
                'middle_name' => 'Владиславовна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Вероника',//8
                'last_name' => 'Бодряга',
                'middle_name' => 'Евгеньевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор',//9
                'last_name' => 'Бодряга',
                'middle_name' => 'Викторович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Николай',//10
                'last_name' => 'Володин',
                'middle_name' => 'Александроаич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Анастасия',//11
                'last_name' => 'Мартыненко',
                'middle_name' => 'Михайловна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],


            [   'name' => 'Алексей',//12
                'last_name' => 'Гукай',
                'middle_name' => 'Евгеньевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Александр',//13
                'last_name' => 'Кожемякин',
                'middle_name' => 'Юрьевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Юрий',//14
                'last_name' => 'Кожемякин',
                'middle_name' => 'Алексеевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Александр',//15
                'last_name' => 'Кожемякин',
                'middle_name' => 'Юрьевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Анатолий',//16
                'last_name' => 'Колесник',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Ольга',//17
                'last_name' => 'Котова',
                'middle_name' => 'Васильевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Михаил',//18
                'last_name' => 'Маруга',
                'middle_name' => 'Михайлович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Александр',//19
                'last_name' => 'Лихолетов',
                'middle_name' => 'Валериевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Ольга',//20
                'last_name' => 'Котова',
                'middle_name' => 'Васильевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Юлия',//21
                'last_name' => 'Мирющенко',
                'middle_name' => 'Степановна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Иван',//22
                'last_name' => 'Савенков',
                'middle_name' => 'Николаевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Вячеслав',//23
                'last_name' => 'Белоусов',
                'middle_name' => 'Владимирович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Николай',//24
                'last_name' => 'Болонов',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Федор',//25
                'last_name' => 'Недопекин',
                'middle_name' => 'Викторович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Александр',//26
                'last_name' => 'Симоненко',
                'middle_name' => 'Петрович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Петр',//27
                'last_name' => 'Асланов',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Наталия',//28
                'last_name' => 'Быковская',
                'middle_name' => 'Владиславовна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Николай',//29
                'last_name' => 'Финошин',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Сергей',//30
                'last_name' => 'Фоменко',
                'middle_name' => 'Александрович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор',//31
                'last_name' => 'Варюхин',
                'middle_name' => 'Николаевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Николай',//32
                'last_name' => 'Иваницин',
                'middle_name' => 'Петрович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Леонид',//33
                'last_name' => 'Метлов',
                'middle_name' => 'Семенович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Александр',//34
                'last_name' => 'Петренко',
                'middle_name' => 'Григорьевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Владислав',//35
                'last_name' => 'Пойманов',
                'middle_name' => 'Дмитриевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Владимир',//36
                'last_name' => 'Румянцев',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Виктор',//37
                'last_name' => 'Финохин',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Владимир',//38
                'last_name' => 'Юрченко',
                'middle_name' => 'Михайлович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Владимир',//39
                'last_name' => 'Данилов',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Игорь',//40
                'last_name' => 'Худяков',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Владимир',//41
                'last_name' => 'Тимченко',
                'middle_name' => 'Иванович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Елена',//42
                'last_name' => 'Деркаченко',
                'middle_name' => 'Васильевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Вячеслав',//43
                'last_name' => 'Долбещенков',
                'middle_name' => 'Васильевич',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],


            [   'name' => 'Елена',//44
                'last_name' => 'Кожекина',
                'middle_name' => 'Николаевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Маргарита',//45
                'last_name' => 'Бабичева',
                'middle_name' => 'Вадимовна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Наталья',//46
                'last_name' => 'Долбещенкова',
                'middle_name' => 'Вячеславовна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Юрий',//47
                'last_name' => 'Стародубцев',
                'middle_name' => 'Александрович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Людмила',//48
                'last_name' => 'Миронова',
                'middle_name' => 'Владимировна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Игорь',//49
                'last_name' => 'Третьяков',
                'middle_name' => 'Александрович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Карина',//50
                'last_name' => 'Джанджгава',
                'middle_name' => 'Геннадьевна',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            [   'name' => 'Геннадий',//51
                'last_name' => 'Ломонос',
                'middle_name' => 'Трофимович',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ]);
    }
}
