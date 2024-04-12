<?php

namespace App\Http\Controllers;

use App\Contracts\APIMessageEntity;
use App\Http\Requests\TestSubmissionRequest;
use App\Services\TestService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TestController extends Controller
{
    use ApiResponse;

    protected TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * Fetch test data.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *     path="/api/test",
     *     summary="Fetch test data",
     *     tags={"Test"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     * )
     */
    public function index(): JsonResponse
    {
        $questions = $this->testService->getTestData();

        return $this->successResponse($questions, ResponseAlias::HTTP_OK, APIMessageEntity::READY);
    }

    /**
     * @OA\Post(
     *     path="/api/test/submit",
     *     summary="Submit test data",
     *     tags={"Test"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "responses"},
     *             @OA\Property(property="email", type="string", example="example@test.com"),
     *             @OA\Property(
     *                 property="responses",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     required={"question_id"},
     *                     @OA\Property(property="question_id", type="integer"),
     *                     @OA\Property(property="option_id", type="integer"),
     *                     @OA\Property(property="user_input", type="string")
     *                 ),
     *             ),
     *         ),
     *
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *     ),
     * )
     */
    public function store(TestSubmissionRequest $request): JsonResponse
    {
        try {
            $responses = $this->testService->submitTest($request->validated());
        } catch (Exception $e) {
            Log::error('Произошла ошибка во время сохранения: ' . $e->getMessage());

            return $this->errorResponse([]);
        }

        return $this->successResponse($responses, ResponseAlias::HTTP_CREATED, APIMessageEntity::CREATED);
    }
}
