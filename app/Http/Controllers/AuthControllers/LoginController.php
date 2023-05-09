<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\LoginFormRequest;

class LoginController extends BaseAuthController
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginFormRequest $reqest)
    {
        dd($reqest->validated());
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
        ]);
    }
}
