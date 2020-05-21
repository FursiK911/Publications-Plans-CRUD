<?php

use Illuminate\Database\Seeder;

class TypeOfPublicationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_of_publication')->insert([
            ['type_publication_name' => 'Учебное пособие'],
            ['type_publication_name' => 'Учебное наглядное пособие'],
            ['type_publication_name' => 'Учебно-методическое пособие'],
            ['type_publication_name' => 'Учебник'],
            ['type_publication_name' => 'Хрестоматия'],
            ['type_publication_name' => 'Методические рекомендации (методические указания)'],
            ['type_publication_name' => 'Курс лекций'],
            ['type_publication_name' => 'Текст лекций'],
            ['type_publication_name' => 'Конспект лекции'],
            ['type_publication_name' => 'Учебная программа'],
            ['type_publication_name' => 'Словарь'],
            ['type_publication_name' => 'Энциклопедия'],
            ['type_publication_name' => 'Справочник'],
            ['type_publication_name' => 'Монография'],
            ['type_publication_name' => 'Автореферат диссертации'],
            ['type_publication_name' => 'Препринт'],
            ['type_publication_name' => 'Тезисы докладов научной конференции'],
            ['type_publication_name' => 'Материалы конференций'],
            ['type_publication_name' => 'Сборник научных трудов'],
            ['type_publication_name' => 'Научный журнал'],
            ['type_publication_name' => 'Буклет'],
            ['type_publication_name' => 'Карточное издание'],
            ['type_publication_name' => 'Плакат'],
            ['type_publication_name' => 'Листовка'],
            ['type_publication_name' => 'Брошюра'],
            ['type_publication_name' => 'Календарь']
        ]);
    }
}
