<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Models\UserResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

// Репозиторий для управления базой данных связанных с вопросами и ответами пользователей
class TestRepository
{
    // Создать пользователя в базе данных, если его не существует
    public function createUserIfNotExists(array $data): Builder|Model
    {
        return User::query()->firstOrCreate($data);
    }

    // Использовать кэш для получения вопросов из базы данных
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

    // Вставить ответы пользователя в базу данных
    public function insertUserResponses(array $data): void
    {
        UserResponse::query()->insert($data);
    }
}
