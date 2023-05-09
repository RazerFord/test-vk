<?php

namespace App\Http\Controllers\CommentControllers;

use App\Http\Requests\Comment\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class StoreController extends BaseCommentController
{
    /**
     * Create a new BaseCommentController instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CommentFormRequest $request): JsonResponse
    {
        $data = $request->validated() + ['user_id' => auth()->user()->id];

        $comment = Comment::create($data);

        return $this->successResponse('comment created', ['id' => $comment->id], JsonResponse::HTTP_OK);
    }
}
