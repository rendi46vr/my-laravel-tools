<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inputCatatan extends FormRequest
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
            'alergi' => 'max:255',
            'tinggibadan' => 'max:10',
            'beratbadan' => 'max:7',
            'tekanandarah' => 'max:50',
            'catatan' => ''
        ];
    }

    public function messages()
    {
        return [
            'alergi.max' => 'Tidak boleh Lebih dari 255 karakter',
            'tinggibadan.max' => 'Tidak boleh Lebih dari 10 karakter',
            'beratbadan.max' => 'Tidak boleh Lebih dari 7 karakter',
            'tekanandarah.max' => 'Tidak boleh Lebih dari 50 karakter',
            'catatan' => ''
        ];
    }

    public function attributes()
    {
        return [
            'alergi' => 'Alergi',
            'tinggibadan' => 'Tinggi Badan',
            'beratbadan' => 'Berat Badan',
            'tekanandarah' => 'Tekanan Darah',
            'catatan' => 'Catatan'
        ];
    }
}
