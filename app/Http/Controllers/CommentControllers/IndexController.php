<?php

namespace App\Http\Controllers\CommentControllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IndexController extends BaseCommentController
{
    /**
     * @OA\Get(
     *      path="/api/comment/{comment_id}",
     *      operationId="commentIndex",
     *      tags={"Projects"},
     *      summary="Index",
     *      description="Get a comment.",
     *      @OA\Parameter(
     *          name="Bearer Token",
     *          description="Authorization token",
     *          required=true,
     *          in="header",
     *          @OA\Schema(
     *              type="string",
     *              example="Bearer 67pIVg4vAbmRZewXK4H0llU4XQtSy3VIxTpofgUOFfpcTfXfK1U0tSM3YNhytEw7BA7KzePrRJoQs3KlQSpzCer10lObTrep8wuZ"
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
     *      @OA\Response(
     *          response=200,
     *          description="Authorized",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResourceTrue")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResourceFalse")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResourceErrorValidation")
     *      )
     *     )
     *
     *  @return \Illuminate\Http\JsonResponse
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
