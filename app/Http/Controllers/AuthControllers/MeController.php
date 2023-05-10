<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\JsonResponse;

class MeController extends BaseAuthController
{
    /**
     * @OA\Get(
     *      path="/api/me",
     *      operationId="me",
     *      tags={"Projects"},
     *      summary="Me",
     *      description="Get the authenticated User.",
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
     *      @OA\Response(
     *          response=200,
     *          description="Ok",
     *          @OA\JsonContent(ref="#/components/schemas/MeResourceTrue")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResourceFalse")
     *      )
     *     )
     *
     *  @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        /**
         * @var \App\Models\User
         */
        $user = auth()->user();
        return $this->successResponse('info', $user->toArray(), JsonResponse::HTTP_OK);
    }
}
