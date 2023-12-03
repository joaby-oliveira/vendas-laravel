<?php

namespace App\Utils;

use Illuminate\Http\Response;

class ResponseHelper
{
    public static function errorResponse(string $message, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }

    public static function deletedResponse()
    {
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
