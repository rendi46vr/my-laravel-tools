<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSupplier extends FormRequest
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
            'kode_supplier' => 'required|unique:suppliers,kode_supplier',
            'nama_supplier' => 'required|max:60',
            'telepon' => 'required|max:15',
            'email' => 'required|email:dns',
            'alamat' => '',
        ];
    }
    public function messages()
    {
        return [
            'kode_supplier.required' => "Kode Supplier Harus Diisi",
            'kode_supplier.unique' => "Kode Supplier Terpakai",
            'nama_supplier.required' => 'Nama Supplier Harus Diisi',
            'telepon.required' => 'Biaya Harus Diisi!',
            'email.required' => 'Biaya Harus Diisi!',
        ];
    }

    public function attributes()
    {
        return [
            'kode_supplier' => 'Kode Supplier',
            'nama_supplier' => 'Nama Supplier',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'alamat' => 'Alamat',
        ];
    }
}
