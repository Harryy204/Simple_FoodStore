<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|unique:users',
            'phone'=>'required|min:10',
            'fullname'=>'required',
            'password'=>'required|min:6',
            'repassword'=>'required|same:password',
            'address'=>'required'
        ];
    }
    public function messages(): array
    {
    return [
            'email.required'=>'Email không được để trống',
            'email.email'=>'Trường này phải là email',
            'email.unique'=>'Email đã được sử dụng',
            'phone'=>'Số điện thoại không được để trống',
            'phone.min'=>'Số điện thoại phải có ít nhất 10 số',
            'fullname.required'=>'Họ tên không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải ít nhất 6 kí tự',
            'repassword.required'=>'Xác nhận mật khẩu không được để trống',
            'repassword.same'=>'Xác nhận mật khẩu không trùng khớp',
            'address.required'=>'Địa chỉ không được để trống'
    ];
    }
}
