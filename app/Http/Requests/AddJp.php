<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddJp extends FormRequest
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
            'kode' => 'required|unique:jenispemeriksaans',
            'jenis' => 'required|max:100',
            'type' => 'required:max:60',
        ];
    }

    public function messages()
    {
        return [
            'kode.required' => "Kode harus diisi",
            'kode.unique' => "Kode terpakai",
            'jenis.required' => 'Jenis harus diisi',
            'jenis.max' => 'Maksimal 100 kata!',
            'type.required' => 'Poli harus diisi!',
            'type.max' => 'Maksimal 60 kata!',
        ];
    }
    public function attributes()
    {
        return [
            'kode' => 'Kode',
            'jenis' => 'Jenis',
            'type' => 'Type',
        ];
    }
}
