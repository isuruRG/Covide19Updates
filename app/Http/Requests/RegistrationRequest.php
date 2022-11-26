<?php

namespace App\Http\Requests;

use App\Rules\CheckIsBothPasswordMatch;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:10'],
            'confirm_password' => ['required', 'string', 'min:6','max:10', new CheckIsBothPasswordMatch]
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'confirm_password.required' => 'Confirm password is required.',
        ];
        return $messages;

    }
}
