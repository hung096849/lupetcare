<?php

namespace App\Http\Requests\Frontend\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
                'email' => 'required|email',
                'phone' => 'required|digits:11|numeric',
                'title' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => ' Cần nhập họ tên',
                'email.required' => ' Cần nhập email',
                'email.email' => 'Phải đúng định dạng email',
                'phone.required' => ' Cần nhập số điện thoại',
                'phone.digits' => ' Số điện thoại phải đầy đủ 11 chữ số,và không bao gồm chữ cái hoặc kí tự khác ',
                'title.required' => 'Vui lòng nhập tiêu đề',
                'message.required' => ' Vui lòng để lại lời nhắn của bạn '
            ])
        ];
      
      
    
       
    }
}
