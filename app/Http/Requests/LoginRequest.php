<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'Je hebt je email niet ingevuld',
            'email.string' => 'Je hebt je email niet ingevuld',
            'email.required' => 'Je hebt je email niet ingevuld',
            'email.email' => 'Het email adres of wachtwoord is ongeldig',
            'email.exists' => 'Het email adres of wachtwoord is ongeldig',

            'password.required' => 'Je hebt je wachtwoord niet ingevuld',
        ];
    }
}
