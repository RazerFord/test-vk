<?php

namespace App\Http\Controllers\CommentControllers;

use App\Http\Requests\Comment\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class StoreController extends BaseCommentController
{
    /**
     * @OA\Post(
     *      path="/api/comment",
     *      operationId="commentStore",
     *      tags={"Projects"},
     *      summary="Store",
     *      description="Store new comment.",
     *      security={{"Authorization":{}}},
     *      @OA\Parameter(
     *          name="text",
     *          description="text of comment",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="long text ...",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="user_id",
     *          description="user id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *              example=1,
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="parent_id",
     *          description="parent comment id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *              example=1,
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Ok",
     *          @OA\JsonContent(ref="#/components/schemas/StoreCommentResourceTrue")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResourceFalse")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/StoreCommentResourceErrorValidation")
     *      )
     *     )
     *
     *  @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CommentFormRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!array_key_exists('user_id', $data)) {
            $data += ['user_id' => auth()->user()->id];
        }

        $comment = Comment::create($data);

        return $this->successResponse('comment created', ['id' => $comment->id], JsonResponse::HTTP_OK);
    }
}
