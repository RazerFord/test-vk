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
     *      @OA\Parameter(
     *          name="tree",
     *          description="get tree",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="boolean",
     *              example=1,
     *              default=0
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
     *          response=404,
     *          description="Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundCommentResourceTrue")
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
