<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\JsonResponse;

class UnauthorizedController extends BaseAuthController
{
    /**
     * Unauthorized.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return $this->errorResponse('unauthorized', [], 401);
    }
}
