<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PSPFormValidation extends FormRequest
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
            'full_name' => ['required'],
            'phone'     => ['required','digits:11','numeric', 'unique:users,phone'],
            'location'  => ['required', 'string'],
            'password'  => ['required', 'confirmed'],
            'email'     => ['required', 'unique:users,email']
        ];
    }
}
