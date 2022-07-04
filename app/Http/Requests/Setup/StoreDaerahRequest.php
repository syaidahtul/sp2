<?php

namespace App\Http\Requests\Setup;

use App\Models\Daerah;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreDaerahRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules()
    {
        return [
            'kod' => 'required', 
            'nama' => 'required', 
            'status' => ['required', 
                Rule::in(collect(Daerah::STATUSES)->keys()->toArray()) 
            ],
        ];
    }
}
