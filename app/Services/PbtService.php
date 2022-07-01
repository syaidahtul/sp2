<?php

namespace App\Services;

use App\Models\Pbt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PbtService 
{
    public function getPbtDropdown() 
    {    
        if (Cache::has('pbts')) {
            $pbts = Cache::get('pbts');
        } else {
            $pbts = Cache::remember('pbts', 3600, function () {
                $lol = Pbt::notKktp()->whereNull('deleted_at')->select('kod', 'nama_pbt')->orderBy('nama_pbt')->get();
                return $lol;
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

    public function getPbt($kod)
    {
        return Pbt::where('kod', $kod)->first();
    }
}