<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDokter extends FormRequest
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
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama' => 'required|max:60',
            'jenkel' => 'required:max:60',
            'telepon' => 'max:15',
            'email' => 'email:dns|unique:dokters,email',
            'koddiv' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kode_dokter.required' => "kode Harus Diisi",
            'kode.unique' => "kode Terpakai",
            'nama.required' => 'Nama Harus Diisi',
            'telepon.max' => 'Tidak boleh lebih dari 15 Karakter!',
            'koddiv.required' => 'Poli Harus Diisi!',
        ];
    }

    public function attributes()
    {
        return [
            'kode_dokter' => ' Kode Dokter',
            'nama' => 'Nama',
            'jenkel' => 'Jenis Kelamin',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'koddiv' => 'Poli',
        ];
    }
}
