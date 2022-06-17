<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StorePbtRequest;
use App\Models\Daerah;
use App\Models\Pbt;
use Illuminate\Http\Request;

class PbtController extends Controller
{

    public function index()
    {
        $pbts = Pbt::orderByDesc('nama_pbt')->paginate(10);
        return view('setup.pbt.index', compact('pbts'));
    }

    public function create()
    {
        $daerahs = Daerah::all();
        return view('setup.pbt.create', compact('daerahs'));
    }

    public function store(StorePbtRequest $request)
    {
        Pbt::create($request->validated());
        session()->flash('flash.banner', $request->nama_pbt . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.pbt.index');
    }

    public function view(Pbt $pbt)
    {
        return view('setup.pbt.view', compact('pbt'));
    }

    public function edit(Pbt $pbt)
    {
        return view('setup.pbt.edit', compact('pbt'));
    }

    public function update(StorePbtRequest $request, Pbt $pbt)
    {
        $pbt->update($request->validated());
        return redirect()->route('setup.pbt.index');
    }

    public function destroy(Pbt $pbt)
    {
        $pbt->delete();
        return redirect()->route('setup.pbt.index');
    }
}
