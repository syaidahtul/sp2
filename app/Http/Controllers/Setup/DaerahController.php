<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreDaerahRequest;
use App\Services\DaerahService;
use Illuminate\Http\Request;

class DaerahController extends Controller
{

    public DaerahService $daerahService;

    public function __construct(DaerahService $daerahService)
    {
            $this->daerahService = $daerahService;
    }

    public function index(Request $request)
    {
        $daerahs = $this->daerahService->filterRows($request->get('kod'), $request->get('nama'), $request->get('aktif'));
        return view('setup.daerah.index', compact('daerahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.daerah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDaerahRequest $request)
    {
        $this->daerahService->store($request->safe()->only(['kod', 'nama', 'status']));
        session()->flash('flash.banner', $request->nama . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.daerah.index');
    }

    public function edit($kod)
    {
        $daerah = $this->daerahService->getDaerah($kod);
        return view('setup.daerah.edit', compact('daerah'));
    }

    public function update(StoreDaerahRequest $request, $kod)
    {
        $this->daerahService->update($request->safe()->only(['kod', 'nama', 'status']));
        session()->flash('flash.banner', $request->nama . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.daerah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
