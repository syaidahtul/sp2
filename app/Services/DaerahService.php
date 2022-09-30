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
                $lol = Daerah::where('status', 'aktif')->select('code', 'description')->orderBy('code')->get();
                return $lol;
            });
        }

        return Daerah::where('status', 'aktif')->select('code', 'description')->orderBy('code')->get();
    }

    public function filterRows($code, $description, $aktif)
    {
        $rows = Daerah::query()
            ->when($code, fn($query, $code) => $query->where('code', 'LIKE', '%'.$code.'%'))
            ->when($description, fn($query, $description) => $query->where('description', 'LIKE', '%'.$description.'%'))
            ->when($aktif, fn($query, $aktif) => $query->where('aktif', $aktif))
            ->paginate(25)->withQueryString();

        return $rows;
    }

    public function store($validated)
    {
        Daerah::create($validated);
    }

    public function update($validated)
    {
        Daerah::where('code', $validated['code'])->update([
            'description' => $validated['description'],
            'aktif' => $validated['status']
        ]);
    }

    public function getDaerah($code)
    {
        return Daerah::where('code', $code)->first();
    }
}
