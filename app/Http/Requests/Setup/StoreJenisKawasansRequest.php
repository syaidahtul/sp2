<?php

namespace App\Http\Requests\Setup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJenisKawasansRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kod' => [
                'required', 'min:3', 'max:6',
                Rule::unique('jenis_kawasans')->ignore('kod','kod')
            ],
            'keterangan' => 'required|max:255',
            'status' => 'required'
        ];
    }
}
