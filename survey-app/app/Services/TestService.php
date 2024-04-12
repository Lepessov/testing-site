<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserResponse;
use App\Repositories\TestRepository;

class TestService
{
    protected TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function submitTest(array $requestData): array
    {
        $user = User::firstOrCreate(['email' => $requestData['email']]);

        $responses = [];
        $userResponses = [];

        foreach ($requestData['responses'] as $response) {
            $responses[] = [
                'question_id' => $response['question_id'],
                'option_id' => $response['option_id'] ?? null,
                'user_input' => $response['user_input'] ?? null,
            ];

            $userResponse = new UserResponse();
            $userResponse->user_id = $user->id;
            $userResponse->question_id = $response['question_id'];
            $userResponse->option_id = $response['option_id'] ?? null;
            $userResponse->user_input = $response['user_input'] ?? null;
            $userResponse->save();
        }

        UserResponse::insert($userResponses);

        return $responses;
    }

    public function getTestData()
    {
        return $this->testRepository->getTestData();
    }
}
