<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreTapakPelupusanSampahRequest;
use App\Services\PbtService;
use App\Services\TapakPelupusanSampahService;
use Illuminate\Http\Request;

class TapakPelupusanSampahController extends Controller
{

    public TapakPelupusanSampahService $service;
    public PbtService $pbtService;

    public function __construct(TapakPelupusanSampahService $service, PbtService $pbtService)
    {
        $this->service = $service;
        $this->pbtService = $pbtService;
    }

    public function index(Request $request)
    {
        $pbts = $this->pbtService->getPbtDropdown();
        $tapak_pelupusan_sampahs = $this->service->filterRows($request->get('nama_tempat'), $request->get('kaedah_pelupusan'), $request->get('aktif'));
        return view('setup.tapak_pelupusan_sampah.index', compact(['pbts','tapak_pelupusan_sampahs']));
    }

    public function create()
    {
        return view('setup.tapak_pelupusan_sampah.create');
    }

    public function store(StoreTapakPelupusanSampahRequest $request)
    {
        $this->service->store($request->validated());
        session()->flash('flash.banner', $request->tempat . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.tapak_pelupusan_sampah.index');
    }

    public function edit($id)
    {
        $tapak = $this->service->getRecord($id);
        return view('setup.tapak_pelupusan_sampah.edit', compact(['tapak']));
    }

    public function update(StoreTapakPelupusanSampahRequest $request, $id)
    {
        $tapak = $this->service->getRecord($id);
        $this->service->store($request->validated(), $tapak);
        session()->flash('flash.banner', $request->tempat . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.tapak_pelupusan_sampah.index');
    }
}
