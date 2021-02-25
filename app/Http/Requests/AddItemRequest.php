<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Vul een titel in',
            'description.required' => 'Vul een beschrijving in',
            'images.required' => 'Je hebt geen afbeelding geupload',
        ];
    }
}
