<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddJpItem extends FormRequest
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
            'kode' => 'required|unique:jp_items',
            'parameter' => 'required|max:60',
            'biaya' => 'required:max:60',
            'perdok' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode.required' => "kode Harus Diisi",
            'kode.unique' => "kode Terpakai",
            'parameter.required' => 'Parameter Harus Diisi',
            'biaya.required' => 'Biaya Harus Diisi!',
            'perdok.required' => 'Biaya Harus Diisi!',
        ];
    }

    public function attributes()
    {
        return [
            'kode' => '',
            'parameter' => 'Parameter',
            'biaya' => '',
            'perdok' => ''
        ];
    }
}
