<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionsQuestion1 = [
            ['option_text' => 'Услуги'],
            ['option_text' => 'Промышленность'],
            ['option_text' => 'Торговля'],
            ['option_text' => 'Сельское хозяйство'],
            ['option_text' => 'Строительство'],
            ['option_text' => 'Иное'],
        ];

        foreach ($optionsQuestion1 as $option) {
            Option::create([
                'question_id' => 1,
                'option_text' => $option['option_text'],
            ]);
        }

        $optionsQuestion2 = [
            ['option_text' => 'Более 5 лет'],
            ['option_text' => 'Менее 1 года'],
            ['option_text' => 'От 1 года до 5 лет'],
            ['option_text' => 'Затрудняюсь ответить'],
        ];

        foreach ($optionsQuestion2 as $option) {
            Option::create([
                'question_id' => 2,
                'option_text' => $option['option_text'],
            ]);
        }

        $optionsQuestion3 = [
            ['option_text' => 'Обучение персонала'],
            ['option_text' => 'Имущественная поддержка (льготная аренда, выкуп в рассрочку, безвозмездное пользование и т.д.)'],
            ['option_text' => 'Информационно-маркетинговая поддержка'],
            ['option_text' => 'Финансовая поддержка (льготные кредиты, субсидии и т.д.)'],
            ['option_text' => 'Правовая поддержка'],
            ['option_text' => 'Иное'],
        ];

        foreach ($optionsQuestion3 as $option) {
            Option::create([
                'question_id' => 3,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 4
        $optionsQuestion4 = [
            ['option_text' => 'Нет'],
            ['option_text' => 'Да'],
        ];

        // Insert options into the database for question 4
        foreach ($optionsQuestion4 as $option) {
            Option::create([
                'question_id' => 4,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 5
        $optionsQuestion5 = [
            ['option_text' => 'Большое количество требуемых документов, необходимых для получения поддержки'],
            ['option_text' => 'Неясность порядка, который необходимо соблюсти при получении поддержки'],
            ['option_text' => 'Длительные сроки получения поддержки'],
            ['option_text' => 'Отсутствие информации о порядке получения поддержки'],
            ['option_text' => 'Не возникало проблем при получении поддержки'],
            ['option_text' => 'Иное'],
        ];

        // Insert options into the database for question 5
        foreach ($optionsQuestion5 as $option) {
            Option::create([
                'question_id' => 5,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 6
        $optionsQuestion6 = [
            ['option_text' => 'Нет'],
            ['option_text' => 'Да'],
            ['option_text' => 'Иное'],
        ];

        // Insert options into the database for question 6
        foreach ($optionsQuestion6 as $option) {
            Option::create([
                'question_id' => 6,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 7
        $optionsQuestion7 = [
            ['option_text' => 'Размещение информации на сайтах государственных органов власти и местного самоуправления'],
            ['option_text' => 'Через организации, образующие инфраструктуру поддержки субъектов МСП'],
            ['option_text' => 'Информационные брошюры, размещение информации в социальных сетях'],
            ['option_text' => 'Проведение круглых столов с участием государственных органов власти, местного самоуправления и бизнеса'],
            ['option_text' => 'Размещение информации на информационных стендах органов власти, в МФЦ, СМИ'],
        ];

        // Insert options into the database for question 7
        foreach ($optionsQuestion7 as $option) {
            Option::create([
                'question_id' => 7,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 8
        $optionsQuestion8 = [
            ['option_text' => 'Нет'],
            ['option_text' => 'Иное'],
            ['option_text' => 'Да'],
        ];

        // Insert options into the database for question 8
        foreach ($optionsQuestion8 as $option) {
            Option::create([
                'question_id' => 8,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 9
        $optionsQuestion9 = [
            ['option_text' => 'На праве собственности'],
            ['option_text' => 'На праве аренды'],
            ['option_text' => 'На ином виде права'],
            ['option_text' => 'Не использую имущество'],
        ];

        // Insert options into the database for question 9
        foreach ($optionsQuestion9 as $option) {
            Option::create([
                'question_id' => 9,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 10
        $optionsQuestion10 = [
            ['option_text' => 'Высокий уровень затрат на текущее содержание имущества (коммунальные расходы, ремонт и иные платежи)'],
            ['option_text' => 'Высокий размер налога на имущество'],
            ['option_text' => 'Высокий размер арендной платы'],
        ];

        // Insert options into the database for question 10
        foreach ($optionsQuestion10 as $option) {
            Option::create([
                'question_id' => 10,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 11
        $optionsQuestion11 = [
            ['option_text' => 'Движимое имущество (машины, оборудование и прочее)'],
            ['option_text' => 'Производственные здания, помещения'],
            ['option_text' => 'Земельные участки'],
            ['option_text' => 'Коворкинги, лофты'],
            ['option_text' => 'Иное'],
        ];

        // Insert options into the database for question 11
        foreach ($optionsQuestion11 as $option) {
            Option::create([
                'question_id' => 11,
                'option_text' => $option['option_text'],
            ]);
        }

        // Question 12
        $optionsQuestion12 = [
            ['option_text' => 'Да'],
            ['option_text' => 'Нет'],
            ['option_text' => 'Иное'],
        ];

        // Insert options into the database for question 12
        foreach ($optionsQuestion12 as $option) {
            Option::create([
                'question_id' => 12,
                'option_text' => $option['option_text'],
            ]);
        }
    }
}
