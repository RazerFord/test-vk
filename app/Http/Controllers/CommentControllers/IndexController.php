<?php

namespace App\Http\Controllers\CommentControllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IndexController extends BaseCommentController
{
    /**
     * Index comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Comment $comment, Request $request): JsonResponse
    {
        $tree = $request->get('tree', '0');
        if ($tree === '1') {
            $data = $comment->retTree();
        } else {
            $data = $comment->ret();
        }
        return $this->successResponse('comment found', $data, JsonResponse::HTTP_OK);
    }
}
