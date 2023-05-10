<?php

namespace App\Http\Controllers\CommentControllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteController extends BaseCommentController
{
    /**
     * @OA\Delete(
     *      path="/api/comment/{comment_id}",
     *      operationId="commentDelete",
     *      tags={"Projects"},
     *      summary="Index",
     *      description="Delete comment.",
     *      security={{"Authorization":{}}},
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
     *      @OA\Response(
     *          response=200,
     *          description="Ok",
     *          @OA\JsonContent(ref="#/components/schemas/DeleteCommentResourceTrue")
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundCommentResourceTrue")
     *      )
     *     )
     *
     *  @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        if (Comment::destroy($id) == 0) {
            throw new ModelNotFoundException();
        }
        return $this->successResponse('comment deleted', null, JsonResponse::HTTP_OK);
    }
}
