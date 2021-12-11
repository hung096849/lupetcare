<?php

namespace App\Http\Requests\Backend\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesFormRequest extends FormRequest
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
        return [
            'service_name' => 'required',
            'image' => 'required|mimes:png,jpg',
            'price' => 'required|min:0',
            'price_sale' => 'min:0',
            'detail' => 'required',
            'description' => 'required',
            'time' => 'required|min:0'
        ];
    }

    public function messages() {
        $messages = [
            'service_name.required' => 'Vui lòng không để trống',
            'image.required' => 'Vui lòng không để trống',
            'image.mimes' => 'Vui lòng chỉ chọn ảnh đuôi png,jpg',
            'price.required' => 'Vui lòng không để trống',
            'price.min' => 'Vui lòng nhập trên 0 đồng',
            'price_sale.min' => 'Vui lòng nhập trên 0 đồng',
            'detail.required' => 'Vui lòng không để trống',
            'description.required' => 'Vui lòng không để trống',
            'time.required' => 'Vui lòng không để trống',
            'time.min' => 'Vui lòng nhập trên 0'
        ];
        return $messages;
    }
}
