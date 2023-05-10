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
     *      security={{"Authorization":{}}},
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
