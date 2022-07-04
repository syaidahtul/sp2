<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePbtKontraktorRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }

    public function rules()
    {
        return [
            'kod_pbt' => 'required',
            'kontraktor_id' => 'required',
            'tarikh_mula' => 'required',
            'tarikh_tamat' => 'required|after:tarikh_mula',
            'no_kontrak' => 'required',
            'status_perkhidmatan' => 'required',
            'catatan' => 'required',
        ];
    }
}
