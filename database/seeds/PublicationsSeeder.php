<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PublicationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('publications')->insert([
            ['chair_id' => '2', 'discipline_id' => '15', 'type_publication_id' => '7', //1
                'name_of_publication' => 'Методические указания к выполнению и оформлению лабораторных работ по дисциплине «Архитектура ЭВМ и микроконтроллеров»',
                'paper_size_id' => '2', 'number_of_pages' => '75', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '7', 'year_of_publication' => '2019',
                'phone_number' => '34-72', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '15', 'type_publication_id' => '2',//2
                'name_of_publication' => 'Учебное пособие по дисциплине «Инженерная и компьютерная графика»',
                'paper_size_id' => '2', 'number_of_pages' => '250', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '13','year_of_publication' => '2019',
                'phone_number' => '34-72', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '1', 'type_publication_id' => '10',//3
                'name_of_publication' => 'Конспект лекций по дисциплине «Информатика и информационно-коммуникационные технологии»',
                'paper_size_id' => '2', 'number_of_pages' => '75', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '12','year_of_publication' => '2019',
                'phone_number' => '31-01', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '30', 'type_publication_id' => '6',//4
                'name_of_publication' => 'Методические рекомендации к выполнению и оформлению лабораторных работ по дисциплине «Программные средства обработки графической информации»',
                'paper_size_id' => '2', 'number_of_pages' => '100', 'number_of_copies' => '50',
                'cover_id' => '1', 'month_of_submission_id' => '7', 'year_of_publication' => '2019',
                'phone_number' => '35-23', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '1', 'type_publication_id' => '14',//5
                'name_of_publication' => 'Моделирование аэродинамических и теплофизических процессов при подавлении выбросов бурого дыма',
                'paper_size_id' => '1', 'number_of_pages' => '80', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '8', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '1', 'discipline_id' => '1', 'type_publication_id' => '5',//6
                'name_of_publication' => 'Техническая гидромеханик',
                'paper_size_id' => '1', 'number_of_pages' => '80', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '16', 'type_publication_id' => '2',//7
                'name_of_publication' => 'Инженерная и компьютерная графика: учебное пособие',
                'paper_size_id' => '1', 'number_of_pages' => '243', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '17', 'type_publication_id' => '2',//8
                'name_of_publication' => 'Архитектура ЭВМ и микроконтроллеров: учебно-методическое пособие',
                'paper_size_id' => '1', 'number_of_pages' => '84', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '1', 'type_publication_id' => '2',//9
                'name_of_publication' => 'Методические рекомендации по организации учебной и производственной практики для бакалавров направления подготовки 09.03.01 "Информатика и вычислительная техника"',
                'paper_size_id' => '1', 'number_of_pages' => '31', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '2', 'discipline_id' => '1', 'type_publication_id' => '2',//10
                'name_of_publication' => 'Методы и средства проектирования информационных систем и технологий: учебное пособие для студентов дневной и заочной форм обучения направления подготовки 09.03.01 "Информатика и вычислительная техника". – 3-е изд',
                'paper_size_id' => '1', 'number_of_pages' => '102', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//11
                'name_of_publication' => 'Подготовка и защита курсовых работ, дипломных работ и магистерских диссертаций: для студентов направлений подготовки «Радиофизика» и «Информационная безопасность» всех форм обучения: учебно-методическое пособие',
                'paper_size_id' => '1', 'number_of_pages' => '88', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '2',//12
                'name_of_publication' => 'Антенно-фидерные устройства: учебное пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '184', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//13
                'name_of_publication' => 'Антенно-фидерные устройства и элементная база: учебно-методическое пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '97', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//14
                'name_of_publication' => 'Устройства ввода радиосигналов в оптические системы обработки информации: учебно-методическое пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '213', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '2',//15
                'name_of_publication' => 'Оптические системы связи: учебное пособие',
                'paper_size_id' => '1', 'number_of_pages' => '104', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//16
                'name_of_publication' => 'Пассивные компоненты волоконно-оптических линий связи: учебно-методическое пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '122', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '2',//17
                'name_of_publication' => 'Системы обзора поверхности Земли: учебное пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '115', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//18
                'name_of_publication' => 'Электромагнитная совместимость радиоэлектронных средств: учебно-методическое пособие',
                'paper_size_id' => '1', 'number_of_pages' => '98', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//19
                'name_of_publication' => 'Акустооптические устройства: учебное пособие',
                'paper_size_id' => '1', 'number_of_pages' => '122', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['chair_id' => '4', 'discipline_id' => '1', 'type_publication_id' => '4',//20
                'name_of_publication' => 'Измерения в экспериментальной и прикладной физике: учебное пособие.',
                'paper_size_id' => '1', 'number_of_pages' => '348', 'number_of_copies' => '1',
                'cover_id' => '1', 'month_of_submission_id' => '1', 'year_of_publication' => '2019',
                'phone_number' => '0', 'is_release' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
