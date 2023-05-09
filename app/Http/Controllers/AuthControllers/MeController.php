<?php

namespace App\Http\Controllers\AuthControllers;

class MeController extends BaseAuthController
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json(auth()->user());
    }
}
