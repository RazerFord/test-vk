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
     *      security={{"Authorization":{}}},
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
