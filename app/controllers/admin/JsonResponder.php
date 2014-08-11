<?php namespace admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait JsonResponder {
    public static function makeJsonValidationErrorResponse($errors)
    {
        // Return a flat array of error messages as JSON.

        return JsonResponse::create([
            'errors' => is_array($errors) ? array_flatten($errors) : [$errors]
        ], 400);
    }
} 