<?php

namespace App\Services;

use App\Models\JenisKawasans;
use Illuminate\Support\Facades\Cache;

class JenisKawasanService
{
    public function getDropdown()
    {
        if (Cache::has('jenisKawasans')) {
            $pbts = Cache::get('jenisKawasans');
        } else {
            $pbts = Cache::remember('jenisKawasans', 3600, function () {
                return JenisKawasans::aktif()->get();
            });
        }

        return $pbts;
    }

    public function filterRows($kod, $nama, $aktif)
    {
        $rows = JenisKawasans::query()
            ->when($kod, fn($query, $kod) => $query->where('kod', 'LIKE', '%'.$kod.'%'))
            ->when($nama, fn($query, $nama) => $query->where('keterangan', 'LIKE', '%'.$nama.'%'))
            ->when($aktif, fn($query) => $query->where('aktif', '=', $aktif))
            ->paginate(15)->withQueryString();

        return $rows;
    }

    public function getRecord($kod)
    {
        return JenisKawasans::where('kod', $kod)->first();
    }

    public function store($validated)
    {
        JenisKawasans::create([
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
        JenisKawasans::where('kod', $validated['kod'])->update($data);
    }

}
