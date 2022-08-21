<?php

namespace App\Http\Requests\Setup;

use App\Models\TapakPelupusanSampahs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreTapakPelupusanSampahRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules(Request $request)
    {
        return [
            'tempat' => [
                'required',
                Rule::unique('tapak_pelupusan_sampahs')->ignore('tempat','tempat')
            ],
            'kaedah_pelupusan' => ['required',
                Rule::in(collect(TapakPelupusanSampahs::KAEDAHPELUPUSAN)->keys()->toArray())
            ],
            'selectedPbt' => 'nullable'
        ];
    }
}
