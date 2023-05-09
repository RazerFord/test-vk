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

        return $this->successResponse('logged out', ['message' => 'Successfully logged out'], JsonResponse::HTTP_OK);
    }
}
