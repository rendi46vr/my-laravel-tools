<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pembayaran extends FormRequest
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
            'nominal' => 'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'nominal.required' => "Nominal harus diisi",
            'nominal.integer' => "Nominal harus angka",

        ];
    }
    public function attributes()
    {
        return [
            'nominal' => 'Nominal',
        ];
    }
}
