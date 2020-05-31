<?php

use Illuminate\Database\Seeder;

class DisciplinesSeeder extends Seeder
{
    public function run()
    {
        DB::table('disciplines')->insert([
            ['name_of_discipline' => 'None'],
            ['name_of_discipline' => 'Информатика и информационно-коммуникационные технологии'],
            ['name_of_discipline' => 'Дискретная математика'],
            ['name_of_discipline' => 'Математическая логика'],
            ['name_of_discipline' => 'История науки и техники'],
            ['name_of_discipline' => 'Операционные системы'],
            ['name_of_discipline' => 'Базы данных'],
            ['name_of_discipline' => 'Сети и телекоммуникации'],
            ['name_of_discipline' => 'Основы программирования'],
            ['name_of_discipline' => 'Программирование'],
            ['name_of_discipline' => 'Web-программирование'],
            ['name_of_discipline' => 'СУБД Oracle'],
            ['name_of_discipline' => 'Объектно-ориентированное программирование'],
            ['name_of_discipline' => 'Современные информационные системы и технологии'],
            ['name_of_discipline' => 'Инженерная и компьютерная графика'],//16
            ['name_of_discipline' => 'Архитектура ЭВМ и микроконтроллеров'],//17
            ['name_of_discipline' => 'ЭВМ и периферийные устройства'],
            ['name_of_discipline' => 'Программирование на языках низкого уровня'],
            ['name_of_discipline' => 'Защита информации'],
            ['name_of_discipline' => 'Методы и средства проектирования информационных систем и технологий'],
            ['name_of_discipline' => 'Технологии разработки программного обеспечения'],
            ['name_of_discipline' => 'Тестирование и внедрение программного обеспечения'],
            ['name_of_discipline' => 'Программирование в системе "1С: Предприятие"'],
            ['name_of_discipline' => 'Администрирование системы "1С: Предприятие"'],
            ['name_of_discipline' => 'Компьютерный дизайн'],
            ['name_of_discipline' => 'Вычислительная математика'],
            ['name_of_discipline' => 'Численные методы'],
            ['name_of_discipline' => 'Вычислительные методы'],
            ['name_of_discipline' => 'Программирование робототехнических систем'],
            ['name_of_discipline' => 'Администрирование операционных систем'],
            ['name_of_discipline' => 'Программные средства обработки графической информации'],
            ['name_of_discipline' => 'Интернет-технологии'],
            ['name_of_discipline' => 'Аппаратные средства локальных сетей'],
            ['name_of_discipline' => 'Web-дизайн'],
            ['name_of_discipline' => 'Программирование в Unix'],
            ['name_of_discipline' => 'Администрирование распределённых систем'],
            ['name_of_discipline' => 'Компьютерная анимация и видео']
        ]);
    }
}
