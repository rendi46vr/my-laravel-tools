<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPasien extends FormRequest
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
            'kodlan' => 'required|unique:server.maidatmas.tpelanggan,kodlan',
            'nam' => 'required',
            'ktp' =>  'required',
            'jenkel' =>  'required',
            'temlah' =>  'required',
            'tgllah' =>  'required',
            'ema' => 'unique:server.maidatmas.tpelanggan,ema',
            'nowa' => '',
            'umur' => '',
            'stakaw' => 'required',
            'ala' => '',
            'koddiv' =>  'required|max:6',
            'jenbay' =>  'required',
            'cat' => '',
            'stapas' =>  'required',
            'grup' =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'kodlan.required' => "Kode  Harus Diisi",
            'kodlan.unique' => "Kode Pasien Sudah Terpakai",
            'ktp.required' => 'NO KTP Harus Diisi',
            'jenkel.required' => 'Jenis kelamin Harus Diisi',
            'temlah.required' => 'Tempat Lahir Harus Diisi',
            'stakaw.required' => 'Kolum ini Harus Diisi',
            'koddiv.required' => 'Poli Harus Diisi',
            'jenbay.required' => 'Jenis Bayar Harus Diisi',
            'stapas.required' => 'Status Pasien Harus Diisi',
            'grup.required' => 'Kelompok Pasien Harus Diisi',
        ];
    }

    public function attributes()
    {
        return [
            'kodlan' => 'Kode Pasien',
            'nam' => 'Nama',
            'ktp' => 'NO KTP',
            'jenkel' => 'Jenis Kelamin',
            'temlah' => 'Tempat Lahir',
            'tgllah' => 'Tanggal Lahir',
            'ema' => 'Email',
            'nowa' => 'Telepon',
            'umur' => 'Umur',
            'stakaw' => 'Status Kawin',
            'ala' => 'Alamat',
            'koddiv' => 'Poli',
            'jenbay' => 'Jenis bayar',
            'cat' => 'Keterangan',
            'stapas' => 'Status Pasien',
            'grup' => 'Kelompok',
        ];
    }
}
