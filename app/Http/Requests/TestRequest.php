<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:5',
            'email' => 'required|email:dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Do not forget your name',
            'name.max' => 'Your name have less than 5 letters?',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Your name',
            'email' => 'The tags',
        ];
    }
}
