<?php

namespace App\Http\Requests;

use App\Models\TapakPelupusanSampahs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreTapakPelupusanSampahRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules()
    {
        return [
            'nama_tempat' => 'required', 
            'kaedah_pelupusan' => ['required', 
                Rule::in(collect(TapakPelupusanSampahs::KAEDAHPELUPUSAN)->keys()->toArray()) 
            ],
        ];
    }
}
