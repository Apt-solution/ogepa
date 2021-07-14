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
            'type'      => ['required'],
            'full_name' => ['required'],
            'phone'     => ['nullable', 'digits:11', 'unique:users,phone'],
            'email'     => ['nullable', 'email', 'unique:users,email'],
            'location'  => ['required', 'string'],
            'lga'       => ['required']
        ];
    }
}
