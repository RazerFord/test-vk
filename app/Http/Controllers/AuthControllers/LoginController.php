<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\LoginFormRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseAuthController
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginFormRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$token = auth()->attempt($credentials)) {
            return $this->errorResponse('unauthorized', [], 401);
        }

        return $this->successResponse('authorized', ['access_token' => $token], 200);
    }
}
