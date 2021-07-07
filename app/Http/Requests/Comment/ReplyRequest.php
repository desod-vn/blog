<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Trả lời bình luận không được để trống.',
            'comment.string' => 'Trả lời bình luận phải là một chuỗi.',
            'comment.max' => 'Trả lời bình luận chỉ chứa tối đa :max ký tự.',
        ];
    }
}
