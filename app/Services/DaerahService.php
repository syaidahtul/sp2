<?php

namespace App\Services;

use App\Models\Daerah;
use Illuminate\Support\Facades\Cache;

class DaerahService 
{
    
    public function getDaerahDropdown() 
    {    
        if (Cache::has('daerahs')) {
            $Daerahs = Cache::get('daerahs');
        } else {
            $Daerahs = Cache::remember('daerahs', 3600, function () {
                $lol = Daerah::where('aktif', 1)->select('kod', 'nama')->orderBy('kod')->get();
                return $lol;
            });
        }

        return Daerah::where('aktif', 1)->select('kod', 'nama')->orderBy('kod')->get();
    }

    public function filterRows($kod, $nama, $aktif)
    {
        $rows = Daerah::query()
            ->when($kod, fn($query, $kod) => $query->where('kod', 'LIKE', '%'.$kod.'%'))
            ->when($nama, fn($query, $nama) => $query->where('nama', 'LIKE', '%'.$nama.'%'))
            ->when($aktif, fn($query, $aktif) => $query->where('aktif', $aktif))
            ->paginate(15)->withQueryString();

        return $rows;
    }

    public function store($validated)
    {
        Daerah::create($validated);
    }

    public function update($validated)
    {        
        Daerah::where('kod', $validated['kod'])->update([
            'nama' => $validated['nama'],
            'aktif' => $validated['status']
        ]);
    }

    public function getDaerah($kod)
    {
        return Daerah::where('kod', $kod)->first();
    }
}