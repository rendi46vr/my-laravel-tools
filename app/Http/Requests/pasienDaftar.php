<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pasienDaftar extends FormRequest
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
            'daftar' => 'required',
            'poli' => 'required|max:60',
            'dokter_id' => 'required|max:15',
            // 'layanan' => 'required|layanan:dns',
        ];
    }
    public function messages()
    {
        return [
            'daftar.required' => "Kode Supplier Harus Diisi",
            'poli.required' => 'Poliklinik  Harus Diisi',
            'dokter_id.required' => 'Dokter Harus Diisi!',
            // 'layanan.required' => 'Layanan Harus Diisi!',
        ];
    }

    public function attributes()
    {
        return [
            'daftar' => 'Kode Supplier',
            'poli' => 'Nama Supplier',
            'dokter_id' => 'Telepon',
            // 'layanan' => 'Layanan',
        ];
    }
}
