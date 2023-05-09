<?php

namespace App\Http\Controllers\CommentControllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteController extends BaseCommentController
{
    /**
     * Delete comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        if (Comment::destroy($id) == 0) {
            throw new ModelNotFoundException();
        }
        return $this->successResponse('comment deleted', null, JsonResponse::HTTP_OK);
    }
}
