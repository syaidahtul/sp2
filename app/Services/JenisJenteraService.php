<?php

namespace App\Services;

use App\Models\JenisJenteras;
use Illuminate\Support\Facades\Cache;

class JenisJenteraService
{
    public function getDropdown()
    {
        if (Cache::has('jenisJentera')) {

            $pbts = Cache::get('jenisJentera');
        } else {
            $pbts = Cache::remember('jenisJentera', 3600, function () {
                return JenisJenteras::aktif()->get();
            });
        }

        return $pbts;
    }

    public function filterRows($kod, $nama, $aktif)
    {
        $rows = JenisJenteras::query()
            ->when($kod, fn($query, $kod) => $query->where('kod', 'LIKE', '%'.$kod.'%'))
            ->when($nama, fn($query, $nama) => $query->where('keterangan', 'LIKE', '%'.$nama.'%'))
            ->when($aktif, fn($query) => $query->where('aktif', '=', $aktif))
            ->paginate(25)->withQueryString();

        return $rows;
    }

    public function getRecord($kod)
    {
        return JenisJenteras::where('kod', $kod)->first();
    }

    public function store($validated)
    {
        JenisJenteras::create([
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
        JenisJenteras::where('kod', $validated['kod'])->update($data);
    }

}
