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
            'first_name' => ['required','string'],
            'last_name'  => ['required','string'],
            'phone' => ['required','digits:11'],
            'lga' => ['required'],
            'client_type' => ['required'],
            'address' => ['required','string']
        ];
    }
}
