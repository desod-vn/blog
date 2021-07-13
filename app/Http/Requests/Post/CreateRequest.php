<?php

namespace App\Http\Requests\Post;

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
            'name' => 'required|string|min:10|max:255',
            'description' => 'string|max:255',
            'content' => 'required|min:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'categories' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống.',
            'name.string' => 'Tên bài viết phải là một chuỗi.',
            'name.min' => 'Tên bài viết phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên bài viết chỉ chứa tối đa :max ký tự.',

            'categories.required' => 'Chọn ít nhất 1 chuyên mục.',
            
            'description.string' => 'Mô tả bài viết phải là một chuỗi.',
            'description.max' => 'Mô tả bài viết chỉ chứa tối đa :max ký tự.',

            'content.required' => 'Nội dung bài viết không được để trống.',
            'content.min' => 'Nội dung bài viết phải chứa tối thiểu :min ký tự.',

            'image.required' => 'Hình ảnh bài viết không được để trống.',
            'image.image' => 'Hình ảnh bài viết không hợp lệ.',
            'image.mimes' => 'Hình ảnh bài viết chỉ cho phép jpeg,png,jpg,gif.',
            'image.max' => 'Hình ảnh bài viết có dung lượng lớn hơn :max KB.',
        ];
    }
}
