<?php

namespace App\Http\Requests\Setup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJenisJenterasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'kod.regex' => 'Gunakan huruf dan nombor sahaja.'
        ];
    }

    public function rules()
    {
        return [
            'kod' => [
                'required', 'min:3', 'max:6', 'regex:/(^[A-Za-z0-9]+$)+/',
                Rule::unique('jenis_jenteras')->ignore('kod','kod')
            ],
            'keterangan' => 'required|max:255',
            'status' => 'required'
        ];
    }
}
