<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
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
           'type' => ['required'],
           'sub_client_type' => ['required'],
           'no_of_sub_client_type' => ['required'],
           'full_name' => ['required','string'],
           'phone'  => ['required', 'digits:11', 'unique:users'],
           'email'  => [''],
           'lga'    => ['required'],
           'address'    => ['required'],
           'monthlyPayment' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ];
    }

    public function messages()
    {
      return [


      ];

    }
}
