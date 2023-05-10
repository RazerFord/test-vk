<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\LoginFormRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseAuthController
{
    /**
     * @OA\Post(
     *      path="/api/login",
     *      operationId="login",
     *      tags={"Projects"},
     *      summary="Login",
     *      description="Log user and get auth token",
     *      @OA\Parameter(
     *          name="email",
     *          description="email user",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="test@vk.ru"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          description="password user",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="password"
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
     *  @var LoginFormRequest $request
     *  @return JsonResponse
     */
    public function __invoke(LoginFormRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$token = auth()->attempt($credentials)) {
            return $this->errorResponse('unauthorized', [], JsonResponse::HTTP_UNAUTHORIZED);
        }

        return $this->successResponse('authorized', ['access_token' => $token], JsonResponse::HTTP_OK);
    }
}
