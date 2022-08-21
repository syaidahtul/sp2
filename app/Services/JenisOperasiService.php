<?php

namespace App\Services;

use App\Models\JenisOperasi;
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
        $rows = JenisOperasi::query()
            ->when($kod, fn($query, $kod) => $query->where('kod', 'LIKE', '%'.$kod.'%'))
            ->when($nama, fn($query, $nama) => $query->where('keterangan', 'LIKE', '%'.$nama.'%'))
            ->when($aktif, fn($query) => $query->where('aktif', '=', $aktif))
            ->paginate(25)->withQueryString();

        return $rows;
    }

    public function getRecord($kod)
    {
        return JenisOperasi::where('kod', $kod)->first();
    }

    public function store($validated)
    {
        JenisOperasi::create([
            'kod' => strtoupper($validated['kod']),
            'keterangan' => $validated['keterangan'],
            'aktif' => $validated['status']
        ]);
    }

    public function update($validated)
    {
        $data = [
            'kod' => strtoupper($validated['kod']),
            'keterangan' => $validated['keterangan'],
            'aktif' => $validated['status']
        ];
        JenisOperasi::where('kod', $validated['kod'])->update($data);
    }

}
