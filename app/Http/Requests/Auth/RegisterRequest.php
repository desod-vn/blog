<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|min:3|max:255|',
            'name' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'fulllname.required' => 'Tên tài khoản không được để trống.',
            'fulllname.string' => 'Tên tài khoản phải là một chuỗi.',
            'fulllname.min' => 'Tên tài khoản phải chứa tối thiểu :min ký tự.',
            'fulllname.max' => 'Tên tài khoản chỉ chứa tối đa :max ký tự.',

            'name.required' => 'Tên đăng nhập không được để trống.',
            'name.string' => 'Tên đăng nhập phải là một chuỗi.',
            'name.min' => 'Tên đăng nhập phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên đăng nhập chỉ chứa tối đa :max ký tự.',
            'name.unique' => 'Tên đăng nhập đã được đăng ký, vui lòng kiểm tra lại.',

            'email.required' => 'Địa chỉ email không được để trống.',
            'email.string' => 'Địa chỉ email phải là một chuỗi.',
            'email.email' => 'Địa chỉ email không hợp lệ, vui lòng kiểm tra lại.',
            'email.max' => 'Địa chỉ email chỉ chứa tối đa :max ký tự.',
            'email.unique' => 'Địa chỉ email đã được đăng ký, vui lòng kiểm tra lại.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải chứa tối thiểu :min ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không chính xác, vui lòng kiểm tra lại.',

            'password_confirmation.required' => 'Xác nhận mật khẩu không được để trống.',
            'password_confirmation.string' => 'Xác nhận mật khẩu phải là một chuỗi.',
            'password_confirmation.min' => 'Xác nhận mật khẩu phải chứa tối thiểu :min ký tự.',
        ];
    }
}
