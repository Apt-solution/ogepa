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
            'phone'     => ['required', 'unique:users'],
            'location'  => ['required', 'string'],
<<<<<<< HEAD
            'email'     => ['unique:users'],
=======
            // 'email'     => ['unique:users'],
>>>>>>> 014cacbc9c37331e2ebeea643c16fb09c59cb3bc
            'lga'       => ['required']
        ];
    }
}
