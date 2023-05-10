<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="LoginResourceFalse",
 *     description="Login resource",
 *     @OA\Xml(
 *         name="LoginResourceFalse"
 *     )
 * )
 */
class LoginResourceErrorValidation
{
    /**
     * @OA\Property(
     *     title="Success",
     *     description="Status answer",
     *     type="boolean",
     *     default="false"
     * )
     * @var bool
     */
    private $success;

    /**
     * @OA\Property(
     *     title="Message",
     *     description="Response message",
     *     type="string",
     *     default="error validation"
     * )
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Response data",
     *     type="object",
     *     default={
     *        "email":{"The email field is required."},
     *        "password":{"The password field is required."},
     *     }
     * )
     * @var array
     */
    private $data;
}
// "email": [
//     "The email field is required."
// ],
// "password": [
//     "The password field is required."
// ]
