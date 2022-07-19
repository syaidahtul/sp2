<?php

namespace App\Services;

use App\Models\JenisOperasi;
use App\Models\Pbt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class JenisOperasiService 
{
    public function getDropdown() 
    {    
        if (Cache::has('jenisOperasis')) {
            $pbts = Cache::get('jenisOperasis');
        } else {
            $pbts = Cache::remember('jenisOperasis', 3600, function () {
                return JenisOperasi::aktif()->get();
            });
        }

        return $pbts;
    }

    public function filterRows($kod, $nama, $aktif)
    {
        $rows = Pbt::query()
            ->notKKTP()
            ->when($kod, fn($query, $kod) => $query->where('kod', 'LIKE', '%'.$kod.'%'))
            ->when($nama, fn($query, $nama) => $query->where('nama_pbt', 'LIKE', '%'.$nama.'%'))
            ->when($aktif, fn($query) => $query->whereNotNull('deleted_at'), fn($query) => $query->whereNull('deleted_at'))
            ->paginate(15)->withQueryString();

        return $rows;
    }

    public function store()
    {

    }

    public function update($validated)
    {        
        if ( strcasecmp($validated['status'],'aktif') == 0) {
            $data = $this->saveData($validated);
        } else {
            $data = $this->delete($validated);
        }
        
        Pbt::where('kod', $validated['kod'])->update($data);
    }

    public function saveData($validated)
    {
        return [
            'nama_pbt' => $validated['nama_pbt'],
            'deleted_by' => null,
            'deleted_at' => null,
        ];
    }

    public function delete($validated)
    {
        return [
            'nama_pbt' => $validated['nama_pbt'],
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Carbon::now(),
        ];
    }
}