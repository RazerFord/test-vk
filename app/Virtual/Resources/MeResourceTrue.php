<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="MeResourceTrue",
 *     description="Me resource",
 *     @OA\Xml(
 *         name="MeResourceTrue"
 *     )
 * )
 */
class MeResourceTrue
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
     *     default="info"
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
     *         "id": 11,
     *         "name": "test",
     *         "email": "test@vk.ru",
     *     }
     * )
     * @var array
     */
    private $data;
}
