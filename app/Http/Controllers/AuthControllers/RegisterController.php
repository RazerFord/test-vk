<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

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

        $credentials['password'] = Hash::make($credentials['password']);
        
        $user = User::create($credentials);

        return $this->successResponse('registered', $user->toArray(), JsonResponse::HTTP_OK);
    }
}
