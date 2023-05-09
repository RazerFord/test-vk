<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(),
            'parent_comment_id' => $this->getParentId(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Get random id of parent comment.
     *
     * @return int
     */
    public function getParentId(): int | null
    {
        $comment = Comment::inRandomOrder()->first();
        return empty($comment) ? null : $comment->id;
    }
}
