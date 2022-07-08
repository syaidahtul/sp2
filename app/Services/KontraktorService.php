<?php

namespace App\Services;

use App\Models\Kontraktor;
use App\Models\PbtKontraktors;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class KontraktorService 
{
    public function getKontraktorDropdown() 
    {    
        if (Cache::has('kontraktors')) {
            $kontraktors = Cache::get('kontraktors');
        } else {
            $kontraktors = Cache::remember('kontraktors', 360, function () {
                return Kontraktor::whereNull('deleted_at')->select('kod', 'nama_pbt')->orderBy('nama_pbt')->get();
            });
        }

        return $kontraktors;
    }

    public function filterRows($kod, $nama, $aktif)
    {
        $query = Kontraktor::with('pbtKontraktors')
            ->when($nama, fn($query, $nama) => $query->where('nama', 'LIKE', '%'.$nama.'%'));

        if ($kod && empty($aktif)) {
            $query->whereHas('pbtKontraktors', function ($query)  use ($kod) {
                $query->where('kod_pbt', '=', $kod);
            });
        }

        if (empty($kod) && $aktif) {
            $query->leftjoin('pbtKontraktors', function ($query)  use ($kod) {
                $query->where('pbts.kod', '=', $kod);
            })
            ->orWhere('status', '=', $aktif);
        }

        if ($kod && $aktif) {
            $query->leftjoin('pbtKontraktors', function ($query)  use ($kod) {
                $query->where('pbts.kod', '=', $kod)->where('');
            })
            ->orWhere('status', '=', $aktif);
        }


        $rows = $query->orderBy('kontraktors.status')->orderBy('kontraktors.created_at', 'desc')->paginate(15);
        
        return $rows;
    }

    public function store($validated)
    {
        Kontraktor::create($validated);
    }

    public function update($validated, $id)
    {       
        Kontraktor::where('id', $id)->update($validated);
    }

    public function createPbtKontraktor($validated)
    {
        Kontraktor::where('id', $validated['kontraktor_id'])->update(['status'=>'progressing']);
        PbtKontraktors::create($validated);
    }
    
    public function delete($validated)
    {
        return [
            'nama_pbt' => $validated['nama_pbt'],
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Carbon::now(),
        ];
    }

    public function getRecord($id)
    {
        return Kontraktor::findOrFail($id);
    }

    public function getKontrakAktif($kontraktorId)
    {
        return PbtKontraktors::where('kontraktor_id', $kontraktorId)
            ->where('status_perkhidmatan', 'aktif')
            ->where('tarikh_tamat', '<=', Carbon::now())->get();
    }
}