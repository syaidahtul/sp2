<?php

namespace App\Http\Requests\Setup;

use App\Models\Daerah;
use App\Models\JenisOperasi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateJenisOperasiRequest extends FormRequest
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
                Rule::unique('jenis_operasis')->ignore($this->kod,'kod')
            ],
            'keterangan' => 'required',
            'status' => ['required',
                Rule::in(collect(JenisOperasi::STATUSES)->keys()->toArray())
            ],
        ];
    }
}
