<?php

namespace App\Http\Requests\Frontend\Order;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CustomerFormRequest extends FormRequest
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
        $now = Carbon::now()->subDays(1)->format('m/d/Y');
        $maxDay = Carbon::now()->addDays(3)->format('m/d/Y');
        $timeMin = "8:00";
        $timeMax = "22:30";
        return [
            'name' => [
                'required',
            ],
            'phone' => [
                'required', 'regex:/([0-9]{10,20})\b/'
            ],
            'email' => [
                'required', 'email','regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,20})(.com)+$/',
            ],
            'time' => [
                'required', "after:$timeMin", "before:$timeMax"
            ],
            'date' => [
                'required', "after:$now", "before:$maxDay"
            ],
            'pet_name' => [
                'required'
            ],
            'service_id' => [
                'required'
            ],
        ];
    }

    public function messages() {
        $now = Carbon::now()->format('m/d/Y');
        $maxDay = Carbon::now()->addDays(3)->format('m/d/Y');
        $timeMin = "8:00";
        $timeMax = "22:30";
        $messages = [
            'name.required' => 'Vui lòng không để trống',
            'phone.required' => 'Vui lòng không để trống',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'email.required' => 'Vui lòng không để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.regex' => 'Vui lòng nhập đúng định dạng email',
            'time.required' => 'Vui lòng không để trống',
            'time.after' => "Vui lòng chọn giờ ít nhất từ lúc $timeMin giờ",
            'time.before' => "Vui lòng chọn giờ không quá $timeMax giờ",
            'date.required' => 'Vui lòng không để trống',
            'date.after' => "Vui lòng chọn ngày ít nhất từ ngày $now",
            'date.after' => "Vui lòng chọn ngày không quá $maxDay",
            'pet_name.required' => 'Vui lòng không để trống',
            'service_id.required' => 'Vui lòng chọn dịch vụ',
            
        ];
        return $messages;
    }

    function failedValidation(ValidationValidator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status' => 422, // erros validate
            ],
            200 // success
        ));
    }
}
