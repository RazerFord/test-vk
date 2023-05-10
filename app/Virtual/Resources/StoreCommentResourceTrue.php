<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="StoreCommentResourceTrue",
 *     description="Store comment true",
 *     @OA\Xml(
 *         name="StoreCommentResourceTrue"
 *     )
 * )
 */
class StoreCommentResourceTrue
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
     *     default="comment created"
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
     *       "id": 12
     *     }
     * )
     * @var array
     */
    private $data;
}
