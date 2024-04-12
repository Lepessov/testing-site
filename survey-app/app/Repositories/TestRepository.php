<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Support\Facades\Cache;

class TestRepository
{
    public function getTestData()
    {
        if (Cache::has('test_data')) {

            return Cache::get('test_data');
        } else {
            $questions = Question::query()->select('id', 'question_text')
                ->with(['options' => function ($query) {
                    $query->select('id', 'option_text', 'question_id');
                }])
                ->get();

            Cache::put('test_data', $questions, 1440);

            return $questions->toArray();
        }
    }
}
