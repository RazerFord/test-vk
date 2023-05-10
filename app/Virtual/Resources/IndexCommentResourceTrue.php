<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="IndexCommentResourceTrue",
 *     description="Index comment",
 *     @OA\Xml(
 *         name="IndexCommentResourceTrue"
 *     )
 * )
 */
class IndexCommentResourceTrue
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
     *     default="comment found"
     * )
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Response data",
     *     type="object",
     *     example={
     *         "id": 1,
     *         "text": "long text ...",
     *         "user_id": 2,
     *         "parent_comment_id": null,
     *         "date": "2023-05-10"
     *     }
     * )
     * @var array
     */
    private $data;
}
