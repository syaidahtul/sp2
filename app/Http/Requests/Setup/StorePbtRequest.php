<?php

namespace App\Http\Requests\Setup;

use Illuminate\Foundation\Http\FormRequest;

class StorePbtRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kod_pbt' => 'required|min:3|max:10',
            'nama_pbt' => 'required|max:255'
        ];
    }
}
