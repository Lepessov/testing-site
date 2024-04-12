<?php

namespace App\Services;

use App\Repositories\TestRepository;

// Сервис класс для бизнес логики нашео приложения
class TestService
{
    // Инициализируем репозиторий, что-бы работать с базой данных
    protected TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    /**
     * Создаем пользователя в базе данных если его не существует.
     * Добавляем его ответы на вопросы в базу данных.
     */
    public function submitTest(array $requestData): array
    {
        $user = $this->testRepository->createUserIfNotExists(['email' => $requestData['email']]);

        $responses = [];
        $userResponsesData = [];

        foreach ($requestData['responses'] as $response) {
            $responses[] = [
                'question_id' => $response['question_id'],
                'option_id' => $response['option_id'] ?? null,
                'user_input' => $response['user_input'] ?? null,
            ];

            $userResponseData = [
                'user_id' => $user->id,
                'question_id' => $response['question_id'],
                'option_id' => $response['option_id'] ?? null,
                'user_input' => $response['user_input'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $userResponsesData[] = $userResponseData;
        }

        $this->testRepository->insertUserResponses($userResponsesData);

        return $responses;
    }

    // Берем Готовые вопросы из базы данных с вариантами
    public function getTestData()
    {
        return $this->testRepository->getTestData();
    }
}
