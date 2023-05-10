<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="LoginResourceTrue",
 *     description="Login resource",
 *     @OA\Xml(
 *         name="LoginResourceTrue"
 *     )
 * )
 */
class LoginResourceTrue
{
    /**
     * @OA\Property(
     *     title="Success",
     *     description="Status answer",
     *     type="boolean",
     *     default="true"
     * )
     * @var bool
     */
    private $success;

    /**
     * @OA\Property(
     *     title="Message",
     *     description="Response message",
     *     type="string",
     *     default="authorized"
     * )
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Response data",
     *     type="object",
     *     default={}
     * )
     * @var array
     */
    private $data;
}
