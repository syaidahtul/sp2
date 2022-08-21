<?php

namespace App\Services;

use App\Models\TapakPelupusanSampahs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TapakPelupusanSampahService
{
    public function filterRows($nama, $kaedah_pelupusan, $aktif)
    {
        $rows = TapakPelupusanSampahs::query()

            ->when($nama, fn($query, $nama) => $query->where('nama_tempat', 'LIKE', '%'.$nama.'%'))
            ->when($kaedah_pelupusan, fn($query, $kaedah_pelupusan) => $query->where('kaedah_pelupusan', '=', $kaedah_pelupusan))
            ->paginate(25)->withQueryString();

        return $rows;
    }

    public function getRecord($id)
    {
        return TapakPelupusanSampahs::findOrFail($id);
    }

    public function store($validated)
    {
        $tapak = TapakPelupusanSampahs::create($validated);
        foreach($validated['selectedPbt'] as $pbt) {
            info($pbt);
            $tapak->pbt()->attach($pbt['kod_pbt']);
        }

        return $tapak;
    }

    public function update($validated)
    {
        foreach($validated['selectedPbt'] as $pbt) {
            $tapak->pbt()->attach($pbt['kod_pbt']);
        }

        return $tapak;
    }
}
