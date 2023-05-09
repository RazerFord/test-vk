<?php

namespace App\Http\Controllers\AuthControllers;

class LogoutController extends BaseAuthController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
