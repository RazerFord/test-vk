<?php

namespace App\Http\Controllers\CommentControllers;

use Illuminate\Http\JsonResponse;

class StoreController extends BaseCommentController
{
    /**
     * Create a new BaseCommentController instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return $this->successResponse('', [], JsonResponse::HTTP_OK);
    }
}
