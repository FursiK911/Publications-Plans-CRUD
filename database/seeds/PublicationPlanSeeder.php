<?php

use Illuminate\Database\Seeder;

class PublicationPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publication_plans')->insert([
            ['discipline_id' => '15', 'type_publication_id' => '6', 'name_of_publication' => 'Методические указания к выполнению и оформлению лабораторных работ по дисциплине «Архитектура ЭВМ и микроконтроллеров»',
                'author_id' => '6', 'paper_size_id' => '2', 'number_of_pages' => '75', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '6', 'phone_number' => '34-72'],

            ['discipline_id' => '15', 'type_publication_id' => '1', 'name_of_publication' => 'Учебное пособие по дисциплине «Инженерная и компьютерная графика»',
                'author_id' => '6', 'paper_size_id' => '2', 'number_of_pages' => '250', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '12', 'phone_number' => '34-72'],

            ['discipline_id' => '1', 'type_publication_id' => '9', 'name_of_publication' => 'Конспект лекций по дисциплине «Информатика и информационно-коммуникационные технологии»',
                'author_id' => '11', 'paper_size_id' => '2', 'number_of_pages' => '75', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '11', 'phone_number' => '31-01'],

            ['discipline_id' => '30', 'type_publication_id' => '6', 'name_of_publication' => 'Методические рекомендации к выполнению и оформлению лабораторных работ по дисциплине «Программные средства обработки графической информации»',
                'author_id' => '5', 'paper_size_id' => '2', 'number_of_pages' => '100', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '6', 'phone_number' => '35-23'],
        ]);
    }
}
