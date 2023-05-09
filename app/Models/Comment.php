<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function ret(): array
    {
        $data = $this->only('text', 'user_id', 'parent_comment_id', 'created_at');

        return [
            'text' => $data['text'],
            'user_id' => $data['user_id'],
            'parent_comment_id' => $data['parent_comment_id'],
            'date' => $data['created_at']->format('Y-m-d'),
        ];
    }
}
