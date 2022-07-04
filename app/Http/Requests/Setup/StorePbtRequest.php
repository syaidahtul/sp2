<?php

namespace App\Http\Requests\Setup;

use App\Models\Pbt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePbtRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules(Request $re)
    {
        return [
            'kod' => 'required|min:3|max:10',
            'nama_pbt' => 'required|max:255',
            'status' => ['required', 
                Rule::in(collect(Pbt::STATUSES)->keys()->toArray()) 
            ],
        ];
    }
}
