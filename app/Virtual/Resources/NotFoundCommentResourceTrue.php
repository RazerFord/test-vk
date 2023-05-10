<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="NotFoundCommentResourceTrue",
 *     description="Not found comment",
 *     @OA\Xml(
 *         name="NotFoundCommentResourceTrue"
 *     )
 * )
 */
class NotFoundCommentResourceTrue
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
     *     default="not found"
     * )
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Response data",
     *     type="object",
     *     default=null
     * )
     * @var array
     */
    private $data;
}
