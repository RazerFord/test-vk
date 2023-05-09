<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\JsonResponse;

class LogoutController extends BaseAuthController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
