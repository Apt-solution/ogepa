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
<<<<<<< HEAD
            'phone'     => ['required'],
            'location'  => ['required', 'string'],
=======
            'phone'     => ['required', 'unique:users'],
            'location'  => ['required', 'string'],
            'email'     => ['unique:users'],
>>>>>>> cb7fd9a58f107a035979cfece032eaf766491ef2
            'lga'       => ['required']
        ];
    }
}
