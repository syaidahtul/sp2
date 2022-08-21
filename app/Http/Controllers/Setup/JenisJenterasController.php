<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisJenterasRequest;
use App\Http\Requests\Setup\UpdateJenisJenterasRequest;
use App\Models\JenisJenteras;
use App\Services\JenisJenteraService;
use Illuminate\Http\Request;

class JenisJenterasController extends Controller
{
    public JenisJenteraService $service;

    public function __construct(JenisJenteraService $service)
    {
            $this->service = $service;
    }

    public function index(Request $request)
    {
        $jenis_jenteras = $this->service->filterRows($request->get('kod'), $request->get('keterangan'), $request->get('status'));
        return view('setup.jenis_jentera.index', compact('jenis_jenteras'));
    }

    public function create()
    {
        return view('setup.jenis_jentera.create');
    }

    public function store(StoreJenisJenterasRequest $request)
    {
        $this->service->store($request->safe()->only(['kod','keterangan','status']));
        session()->flash('flash.banner', $request->keterangan . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_jentera.index');
    }

    public function edit($id)
    {
        $jenis_jentera = $this->service->getRecord($id);
        return view('setup.jenis_jentera.edit', compact('jenis_jentera'));
    }

    public function update(UpdateJenisJenterasRequest $request, $id)
    {
        $this->service->update($request->safe()->only(['kod', 'keterangan', 'status']));
        session()->flash('flash.banner', $request->keterangan . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_jentera.index');
    }

}
