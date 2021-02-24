<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',

            'email' => 'required|string|email|max:255|unique:users',

            'township' => 'required|string|max:255',
            'address' => 'required|string|max:255',

            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'firstname.sometimes' => 'Je hebt je voornaam niet ingevuld',
            'firstname.string' => 'Je hebt je voornaam niet ingevuld',
            'firstname.max:255' => 'Je hebt je voornaam niet ingevuld',

            'lastname.sometimes' => 'Je hebt je achternaam niet ingevuld',
            'lastname.string' => 'Je hebt je achternaam niet ingevuld',
            'lastname.max:255' => 'Je hebt je achternaam niet ingevuld',

            'township.required' => 'Je hebt je gemeente niet ingevuld',
            'township.string' => 'Je hebt je gemeente niet ingevuld',
            'township.max:255' => 'Je gemeente mag niet meer dan 255 karakters bevatten',

            'address.required' => 'Je hebt je adres niet ingevuld',
            'address.string' => 'Je hebt je adres niet ingevuld',
            'address.max:255' => 'Je adres mag niet meer dan 255 karakters bevatten',

            'email.required' => 'Je hebt je email niet ingevuld',
            'email.string' => 'Je hebt je email niet ingevuld',
            'email.email' => 'Email adres ongeldig',
            'email.max:255' => 'Je email mag niet meer dan 255 karakters bevatten',
            'email.unique' => 'Er is al een account voor dit email adres',

            'password.required' => 'Je hebt geen wachtwoord ingevuld',
            'password.confirmed' => 'Je hebt je wachtwoord niet bevestigd',
        ];
    }
}
