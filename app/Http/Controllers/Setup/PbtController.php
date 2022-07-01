<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StorePbtRequest;
use App\Models\Daerah;
use App\Models\Pbt;
use App\Services\PbtService;
use Illuminate\Http\Request;

class PbtController extends Controller
{

    public PbtService $pbtService;

    public function __construct(PbtService $pbtService)
    {
            $this->pbtService = $pbtService;
    }

    public function index(Request $request)
    {
        info($request->get('namapbt'));
        $pbts = $this->pbtService->filterRows($request->get('kod'), $request->get('namapbt'), $request->get('aktif'));
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

    public function edit($kod)
    {
        $pbt = $this->pbtService->getPbt($kod);
        return view('setup.pbt.edit')->with('pbt', $pbt);
    }

    public function update(StorePbtRequest $request, $kod)
    {
        $pbt = $this->pbtService->update($request->safe()->only(['kod', 'nama_pbt', 'status']));
        return redirect()->route('setup.pbt.index');
    }

    public function destroy(Pbt $pbt)
    {
        $pbt->delete();
        return redirect()->route('setup.pbt.index');
    }
}
