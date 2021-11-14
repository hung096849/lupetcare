<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return[
            request()->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'phone' => 'required|digits:10|numeric',
                'password'=> 'required|min:6',
                're_password' => 'required_with:password|same:password|min:6'
            ],
            [
                'name.required' => ' Cần nhập họ và tên',
                'email.required' => ' Cần nhập email',
                'email.email' => 'Phải đúng định dạng email',
                'email.unique' => 'Email này đã được sử dụng',
                'password.required' => ' Cần nhập mật khẩu',
                'password.min' => 'Mật khẩu phải ít nhất  kí tự',
                're_password' => 'Cần nhập lại mật khẩu ',
                're_password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu trên ',
                'phone.required' => ' Cần nhập số điện thoại',
                'phone.digits' => ' Số điện thoại phải đầy đủ 10 chữ số,và không bao gồm chữ cái hoặc kí tự khác ',
               
            ])
        ];
    }
}
