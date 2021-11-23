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
        $now = Carbon::now()->format('m/d/Y');
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
                'required'
            ],
            'date' => [
                'required', "after:$now"
            ],
            // 'pet_name' => [
            //     'required'
            // ]
        ];
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
