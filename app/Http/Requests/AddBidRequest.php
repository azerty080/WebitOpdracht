<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBidRequest extends FormRequest
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
            'price' => 'required|integer|min:1',
        ];
    }




    public function messages()
    {
        return [
            'price.required' => 'Geef aub een prijs in',
            'price.integer' => 'Geef aub een nummer in',
            'price.min' => 'Je kan niet lager dan 1 euro bieden'
        ];
    }
}
