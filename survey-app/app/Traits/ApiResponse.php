<?php

namespace App\Traits;

use App\Contracts\APIMessageEntity;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

// Трэйт шаблон для наших json ответов
trait ApiResponse
{
    // В случае успешного ответа возвращается ответ с сообщением "success: true"
    public function successResponse(
        mixed $data = null,
        int $code = ResponseAlias::HTTP_OK,
        mixed $message = APIMessageEntity::READY
    ): JsonResponse {
        return response()->json(
            [
                'success' => true,
                'data'    => $data,
                'message' => $message
            ],
            $code,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    // В случае успешного ответа возвращается ответ с сообщением "success: false"
    public function errorResponse(
        mixed $data = null,
        int $code = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR,
        mixed $message = APIMessageEntity::DEFAULT_ERROR_MESSAGE
    ): JsonResponse {
        return response()->json(
            [
                'success' => false,
                'data'    => $data,
                'message' => $message
            ],
            $code,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
