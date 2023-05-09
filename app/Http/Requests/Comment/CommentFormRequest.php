<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\BaseRequest;

class CommentFormRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'text' => 'required|string',
            'parent_id' => 'filled|integer|exists:comments,id',
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'parent_id.exists' => 'comment id must exist',
        ];
    }
}
