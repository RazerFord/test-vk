<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\JsonResponse;

class MeController extends BaseAuthController
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        /**
         * @var \App\Models\User
         */
        $user = auth()->user();
        return $this->successResponse('info', $user->toArray(), JsonResponse::HTTP_OK);
    }
}
