<?php

namespace App\Http\Controllers\CommentControllers;

use App\Http\Requests\Comment\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class UpdateController extends BaseCommentController
{
    /**
     * Update comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CommentFormRequest $request, Comment $comment): JsonResponse
    {
        $data = $request->validated();

        if (!array_key_exists('user_id', $data)) {
            $data += ['user_id' => auth()->user()->id];
        }

        $comment->update($data);

        return $this->successResponse('comment updated', $comment->toArray(), JsonResponse::HTTP_OK);
    }
}
