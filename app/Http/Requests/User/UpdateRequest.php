<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumberCheck;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|min:3|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:10',
            'phone' => ['required', 'numeric', new PhoneNumberCheck()],
            'address' => 'required|string|max:255',
            'story' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Tên tài khoản không được để trống.',
            'fullname.string' => 'Tên tài khoản phải là một chuỗi.',
            'fullname.min' => 'Tên tài khoản phải chứa tối thiểu :min ký tự.',
            'fullname.max' => 'Tên tài khoản chỉ chứa tối đa :max ký tự.',

            'birthday.required' => 'Ngày sinh nhật không được để trống.',
            'birthday.date' => 'Ngày sinh nhật phải là một ngày yyyy/mm/dd.',

            'gender.required' => 'Giới tính không được để trống.',
            'gender.string' => 'Giới tính phải là một chuỗi.',
            'gender.max' => 'Giới tính chỉ chứa tối đa :max ký tự.',

            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.numeric' => 'Số điện thoại phải là một dãy số.',

            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ chỉ chứa tối đa :max ký tự.',

            'story.required' => 'Giới thiệu bản thân không được để trống.',
            'story.string' => 'Giới thiệu bản thân phải là một chuỗi.',
            'story.max' => 'Giới thiệu bản thân chỉ chứa tối đa :max ký tự.',

        ];
    }
}
