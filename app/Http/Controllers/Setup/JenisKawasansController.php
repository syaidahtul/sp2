<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisKawasansRequest;
use App\Http\Requests\Setup\UpdateJenisKawasansRequest;
use App\Models\JenisKawasans;
use App\Services\JenisKawasanService;
use Illuminate\Http\Request;

class JenisKawasansController extends Controller
{
    public JenisKawasanService $service;

    public function __construct(JenisKawasanService $service)
    {
            $this->service = $service;
    }

    public function index(Request $request)
    {
        $jenis_kawasans = $this->service->filterRows($request->get('kod'), $request->get('keterangan'), $request->get('status'));
        return view('setup.jenis_kawasan.index', compact('jenis_kawasans'));
    }

    public function create()
    {
        return view('setup.jenis_kawasan.create');
    }

    public function store(StoreJenisKawasansRequest $request)
    {
        $this->service->store($request->safe()->only(['kod','keterangan','status']));
        session()->flash('flash.banner', $request->keterangan . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_kawasan.index');
    }

    public function edit($id)
    {
        $jenis_kawasan = $this->service->getRecord($id);
        return view('setup.jenis_kawasan.edit', compact('jenis_kawasan'));
    }

    public function update(UpdateJenisKawasansRequest $request, $id)
    {
        $this->service->update($request->safe()->only(['kod', 'keterangan', 'status']));
        session()->flash('flash.banner', $request->keterangan . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_kawasan.index');
    }

}
