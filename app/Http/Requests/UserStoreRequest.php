<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'mobile_number' => [
                'required'
            ],
            'promotional_code' => [
                'required',
                'unique:users,promotional_code',
                'exists:promotional_codes,promotional_code',
                'min:8',
                'max:8'
            ],
            'GDPR' => [
                'required'
            ],
            'terms' => [
                'required'
            ]
            ];
    }

    public function messages(){
        return [
            'name.required'=>'You need to insert your name.',
            'mobile_number.required'=>'You need to insert your mobile number.',
            'promotional_code.required'=>'You need to insert your promotional code.',
            'GDPR.required'=>'You need to accept General Data Protection Regulation.',
            'terms.required'=>'You need to accept our terms and conditions.',
            'promotional_code.unique'=>'This promotional code is already registered.',
            'promotional_code.exists'=>'This promotional code it\'s not valid. Please try insert a correct one.',
        ];
    }
}
