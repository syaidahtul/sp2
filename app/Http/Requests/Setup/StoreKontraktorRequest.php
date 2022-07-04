<?php

namespace App\Http\Requests\Setup;

use App\Models\Daerah;
use App\Models\Kontraktor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreKontraktorRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'no_tel' => 'nullable',
            'no_fax' => 'nullable',
            'alamat' => 'nullable',
            'poskod' => 'nullable|sometimes|numeric',
            'region' => 'required|exists:daerahs,kod',
            'state' => ['required', 
                Rule::in(Daerah::NEGERI) 
            ],
            'contact_person_nama' => 'nullable', 
            'contact_person_no_tel' => 'nullable',
            'catatan' => 'nullable|sometimes|max:500',
            'status' => ['required',
                Rule::in(collect(Kontraktor::STATUSES)->keys()->toArray()) 
            ],
        ];
    }
}
