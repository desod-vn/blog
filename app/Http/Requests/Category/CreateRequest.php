<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50|unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên chuyên mục không được để trống.',
            'name.string' => 'Tên chuyên mục phải là một chuỗi.',
            'name.min' => 'Tên chuyên mục phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên chuyên mục chỉ chứa tối đa :max ký tự.',
            'name.unique' => 'Tên chuyên mục đã tồn tại.',

        ];
    }
}
