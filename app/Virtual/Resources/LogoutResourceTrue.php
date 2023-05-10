<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="LogoutResourceTrue",
 *     description="Logout resource",
 *     @OA\Xml(
 *         name="LogoutResourceTrue"
 *     )
 * )
 */
class LogoutResourceTrue
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
     *     default="logged out"
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
     *         "message" : "Successfully logged out"
     *     }
     * )
     * @var array
     */
    private $data;
}
