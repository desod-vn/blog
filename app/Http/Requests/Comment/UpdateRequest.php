<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'comment.required' => 'Bình luận không được để trống.',
            'comment.string' => 'Bình luận phải là một chuỗi.',
            'comment.max' => 'Bình luận chỉ chứa tối đa :max ký tự.',
        ];
    }
}
