<?php

namespace App\Http\Controllers;

use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel OpenApi Documentation",
 *      description="Test project documentation from VK",
 *      @OA\Contact(
 *          email="desk10567@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 *
 * @OAs\SecurityScheme(
 *    securityScheme="bearerAuth",
 *    in="header",
 *    name="Authorization",
 *    type="http",
 *    scheme="bearer",
 *    bearerFormat="JWT",
 * ),
 */
class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Class of service.
     *
     * @var
     */
    protected $service;

    /**
     * Return response.
     *
     * @param string|null $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    protected function errorResponse(string|null $message, array|null $data, int $code): JsonResponse
    {
        return ErrorResponse::response($message, $data, $code);
    }

    /**
     * Return response.
     *
     * @param string|null $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    protected function successResponse(string|null $message, array|null $data, int $code): JsonResponse
    {
        return SuccessResponse::response($message, $data, $code);
    }
}
