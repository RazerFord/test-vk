<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseAuthController
{
    /**
     * @OA\Post(
     *      path="/api/register",
     *      operationId="register",
     *      tags={"Projects"},
     *      summary="Register",
     *      description="Register a new user.",
     *      @OA\Parameter(
     *          name="name",
     *          description="name user",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="tester"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="email user",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="newtest@vk.ru"
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
     *          description="Ok",
     *          @OA\JsonContent(ref="#/components/schemas/MeResourceTrue")
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/RegisterResourceErrorValidation")
     *      )
     *     )
     *
     *  @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterFormRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        return $this->successResponse('registered', $user->toArray(), JsonResponse::HTTP_OK);
    }
}
