<?php

namespace App\Http\Requests\Setup;

use App\Models\Daerah;
use App\Models\Kontraktor;
use App\Rules\TiadaKontrakAktif;
use App\Services\KontraktorService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreKontraktorRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->hasRole('ADMIN');
    }
    
    public function messages()
    {
        return [
                '*.required_unless' => ':attribute diperlukan kecuali status adalah Tidak Aktif',
        ];
    }

    public function rules(Request $request)
    {
        $tidakAktif = [
            'nama' => 'nullable',
            'no_tel' => 'nullable',
            'no_fax' => 'nullable',
            'alamat' => 'nullable',
            'poskod' => 'nullable|sometimes|numeric',
            'region' => 'nullable',
            'state' => ['nullable','sometimes', 
                Rule::in(Daerah::NEGERI) 
            ],
            'contact_person_nama' => 'nullable', 
            'contact_person_no_tel' => 'nullable',
            'catatan' => 'nullable|sometimes|max:500',
            'status' => ['required',
                Rule::in(collect(Kontraktor::STATUSES)->keys()->toArray()) 
            ],
        ];

        if (strcmp($request->status, 'tidak_aktif') === 0 && $this->_method === 'PUT') {
            return [ 
                'nama' => ['nullable',
                    new TiadaKontrakAktif($request->kontraktor)
                ],
                'no_tel' => 'nullable',
                'no_fax' => 'nullable',
                'alamat' => 'nullable',
                'poskod' => 'nullable|sometimes|numeric',
                'region' => 'nullable',
                'state' => ['nullable','sometimes', 
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

        if (strcmp($request->old_status, 'tidak_aktif') === 0) {
            return $tidakAktif;
        } else {
            return [
                'nama' => 'required',
                'no_tel' => 'nullable',
                'no_fax' => 'nullable',
                'alamat' => 'nullable',
                'poskod' => 'nullable|sometimes|numeric',
                'region' => 'required_unless:status,tidak_aktif|exists:daerahs,kod',
                'state' => ['required_unless:status,tidak_aktif', 
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
}
