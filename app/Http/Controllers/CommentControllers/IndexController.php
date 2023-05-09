<?php

namespace App\Http\Controllers\CommentControllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class IndexController extends BaseCommentController
{
    /**
     * Index comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Comment $comment): JsonResponse
    {
        $data = $comment->ret();
        return $this->successResponse('comment found', $data, JsonResponse::HTTP_OK);
    }
}
