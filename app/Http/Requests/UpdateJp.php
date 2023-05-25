<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJp extends FormRequest
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
    public function rules($uniq)
    {
        return [
            'kode' => 'required|unique:jenispemeriksaans,kode,' . $uniq,
            'jenis' => 'required|max:100',
            'koddiv' => 'required:max:60',
        ];
    }

    public function messages()
    {
        return [
            'kode.required' => "Kode Harus Diisi",
            'kode.unique' => "Kode Terpakai",
            'jenis.required' => 'Do not forget your Jenis',
            'jenis.max' => 'Maksimal 100 kata!',
            'koddiv.required' => 'Poli Harus diisi!',
            'koddiv.max' => 'Maksimal 60 kata!',
        ];
    }
    public function attributes()
    {
        return [
            'kode' => 'Kode',
            'jenis' => 'Jenis',
            'koddiv' => 'Poli',
        ];
    }
}
