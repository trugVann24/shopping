<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên không được nhỏ hơn 2 kí tự',
            'email.required' => 'Email không được được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Nhập sai định dạng email',
            'password.required' => 'Mật khẩu không được được để trống',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
        ];
    }
}
