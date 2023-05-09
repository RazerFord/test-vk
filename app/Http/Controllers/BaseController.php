<?php

namespace App\Http\Controllers;

use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

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
