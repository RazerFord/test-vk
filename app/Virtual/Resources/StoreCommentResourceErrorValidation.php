<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="StoreCommentResourceErrorValidation",
 *     description="Store comment error validation",
 *     @OA\Xml(
 *         name="StoreCommentResourceErrorValidation"
 *     )
 * )
 */
class StoreCommentResourceErrorValidation
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
     *     example={
     *       "text": {
     *           "The text field is required."
     *       }
     *     }
     * )
     * @var array
     */
    private $data;
}
