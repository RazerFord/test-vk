<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\JsonResponse;

class LogoutController extends BaseAuthController
{
    /**
     * @OA\Get(
     *      path="/api/logout",
     *      operationId="logout",
     *      tags={"Projects"},
     *      summary="Logout",
     *      description="Log the user out (Invalidate the token).",
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
     *          @OA\JsonContent(ref="#/components/schemas/LogoutResourceTrue")
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
        auth()->logout();

        return $this->successResponse('logged out', ['message' => 'Successfully logged out'], JsonResponse::HTTP_OK);
    }
}
