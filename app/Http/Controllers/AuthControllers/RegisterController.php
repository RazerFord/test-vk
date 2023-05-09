<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseAuthController
{
    /**
     * Register a new user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterFormRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $user = User::create($credentials);

        return $this->successResponse('registered', $user->toArray(), JsonResponse::HTTP_OK);
    }
}
