<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisOperasiRequest;
use App\Http\Requests\Setup\UpdateJenisOperasiRequest;
use App\Models\JenisOperasi;
use App\Services\JenisOperasiService;
use Illuminate\Http\Request;

class JenisOperasisController extends Controller
{

    public JenisOperasiService $service;

    public function __construct(JenisOperasiService $service)
    {
            $this->service = $service;
    }

    public function index(Request $request)
    {
        $jenis_operasis = $this->service->filterRows($request->get('kod'), $request->get('keterangan'), $request->get('status'));
        return view('setup.jenis_operasi.index', compact('jenis_operasis'));
    }

    public function create()
    {
        return view('setup.jenis_operasi.create');
    }

    public function store(StoreJenisOperasiRequest $request)
    {
        $this->service->store($request->safe()->only(['kod','keterangan','status']));
        session()->flash('flash.banner', $request->keterangan . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_operasis.index');
    }

    public function show($id)
    {
        $jenis_operasi = $this->service->getRecord($id);
        return view('setup.jenis_operasi.view', compact('jenis_operasi'));
    }

    public function edit($id)
    {
        $jenis_operasi = $this->service->getRecord($id);
        return view('setup.jenis_operasi.edit', compact('jenis_operasi'));
    }

    public function update(UpdateJenisOperasiRequest $request, $id)
    {
        $this->service->update($request->safe()->only(['kod', 'keterangan', 'status']));
        session()->flash('flash.banner', $request->keterangan . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_operasis.index');
    }

}
