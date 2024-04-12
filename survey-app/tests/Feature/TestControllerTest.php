<?php

namespace Tests\Feature;

use App\Http\Controllers\TestController;
use App\Models\User;
use App\Services\TestService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class TestControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
    }

    public function testIndex(): void
    {
        $response = $this->get("/api/test");
        $response->assertStatus(ResponseAlias::HTTP_OK);
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                '*' => [
                    'id',
                    'question_text',
                    'options' => [
                        '*' => [
                            'id',
                            'option_text',
                            'question_id'
                        ]
                    ]
                ]
            ],
        ]);
    }

    public function testStore(): void
    {
        $user = User::factory()->create();

        $requestData = [
            'email' => $user->email,
            'responses' => [
                [
                    'question_id' => 1,
                    'option_id' => 2,
                ],
                [
                    'question_id' => 2,
                    'user_input' => 'Some text input',
                ],
            ]
        ];

        $response = $this->post('api/test/submit', $requestData);
        $response->assertStatus(ResponseAlias::HTTP_CREATED);
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                '*' => [
                    'question_id',
                    'option_id',
                    'user_input',
                ]
            ],
        ]);
    }
}
