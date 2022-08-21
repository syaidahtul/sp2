<?php

namespace App\Http\Requests\Setup;

use App\Models\JenisKawasans;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateJenisJenterasRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules()
    {
        return [
            'kod' => [
                'required',
                Rule::unique('jenis_kawasans')->ignore($this->kod,'kod')
            ],
            'keterangan' => 'required',
            'status' => ['required',
                Rule::in(collect(JenisKawasans::STATUSES)->keys()->toArray())
            ],
        ];
    }
}
