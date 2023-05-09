<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'parent_comment_id',
        'user_id',
    ];


    /**
     * Return info about comment.
     *
     * @return array<string, string>
     */
    public function ret(): array
    {
        $data = $this->only('id', 'text', 'user_id', 'parent_comment_id', 'created_at');

        return [
            'id' => $data['id'],
            'text' => $data['text'],
            'user_id' => $data['user_id'],
            'parent_comment_id' => $data['parent_comment_id'],
            'date' => $data['created_at']->format('Y-m-d'),
        ];
    }

    /**
     * Return tree with comment.
     *
     * @return array<string, string>
     */
    public function retTree(): array
    {
        $data = $this->ret();
        if (!empty($data['parent_comment_id']) && (int)$data['parent_comment_id'] < (int)$data['id']) {
            $data['parent_content'] = $this->comment->retTree();
        }
        return $data;
    }


    /**
     * Get the parent comment.
     */
    public function comment(): HasOne
    {
        return $this->hasOne(Comment::class, 'id', 'parent_comment_id');
    }
}
