<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="DeleteCommentResourceTrue",
 *     description="Delete comment",
 *     @OA\Xml(
 *         name="DeleteCommentResourceTrue"
 *     )
 * )
 */
class DeleteCommentResourceTrue
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
     *     default="comment deleted"
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
