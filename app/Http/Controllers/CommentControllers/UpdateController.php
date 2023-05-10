<?php

namespace App\Http\Controllers\CommentControllers;

use App\Http\Requests\Comment\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class UpdateController extends BaseCommentController
{

    /**
     * @OA\Put(
     *      path="/api/comment/{comment_id}",
     *      operationId="commentUpdate",
     *      tags={"Projects"},
     *      summary="Index",
     *      description="Update comment.",
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
     *          name="comment_id",
     *          description="comment id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example=1
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
     *      @OA\Response(
     *          response=200,
     *          description="Ok",
     *          @OA\JsonContent(ref="#/components/schemas/IndexCommentResourceTrue")
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
    public function __invoke(CommentFormRequest $request, Comment $comment): JsonResponse
    {
        $data = $request->validated();

        if (!array_key_exists('user_id', $data)) {
            $data += ['user_id' => auth()->user()->id];
        }

        $comment->update($data);

        return $this->successResponse('comment updated', $comment->ret(), JsonResponse::HTTP_OK);
    }
}
