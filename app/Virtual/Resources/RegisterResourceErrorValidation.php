<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="RegisterResourceErrorValidation",
 *     description="Register error validation resource",
 *     @OA\Xml(
 *         name="RegisterResourceErrorValidation"
 *     )
 * )
 */
class RegisterResourceErrorValidation
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
     *         "name": {
     *           "The name field is required."
     *         },
     *         "email": {
     *           "The email field is required."
     *          },
     *         "password": {
     *            "The password field is required."
     *          }
     *     }
     * )
     * @var array
     */
    private $data;
}
