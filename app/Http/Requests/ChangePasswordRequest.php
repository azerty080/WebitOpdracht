<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|confirmed|different:old_password'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Je hebt je oude wachtwoord niet ingevuld',
          
            'password.required' => 'Je hebt geen nieuw wachtwoord ingevuld',
            'password.confirmed' => 'Je hebt je nieuw wachtwoord niet correct bevestigd',
            'password.different' => 'Je oud en nieuw wachtwoord is hetzelfde',
        ];
    }
}
