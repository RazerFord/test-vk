<?php

namespace App\Exceptions;

use App\Responses\ErrorResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class NotAuthException extends Exception
{
    /**
     * @var array|null $errors Errors
     */
    protected $errors;

    public function __construct(
        Throwable|null $previous = null
    ) {
        $this->errors = [];
        parent::__construct('unauthorized', 401, $previous);
    }

    /**
     * Render response page
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return ErrorResponse::response($this->message, $this->errors, $this->code);
    }
}
