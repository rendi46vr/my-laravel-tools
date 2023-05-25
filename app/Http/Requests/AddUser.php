<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends FormRequest
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
            'username' => 'required|unique:users',
            'name' => 'required|max:60',
            'role' => 'required:max:60',
            ''
        ];
    }

    public function messages()
    {
        return [
            'username.required' => "Username Harus Diisi",
            'username.unique' => "Username Terpakai",
            'name.required' => 'Do not forget your name',
            'name.max' => 'Maksimal 60 kata!',
            'role.max' => 'Maksimal 60 kata!',
        ];
    }

    public function attributes()
    {
        return [
            'username' => '',
            'name' => '',
            'role' => '',
        ];
    }
}
