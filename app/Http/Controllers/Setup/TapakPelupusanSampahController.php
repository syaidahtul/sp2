<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTapakPelupusanSampahRequest;
use App\Services\PbtService;
use App\Services\TapakPelupusanSampahService;
use Illuminate\Http\Request;

class TapakPelupusanSampahController extends Controller
{

    public TapakPelupusanSampahService $tapakPelupusanSampahService;
    public PbtService $pbtService;

    public function __construct(TapakPelupusanSampahService $tapakPelupusanSampahService, PbtService $pbtService)
    {
        $this->tapakPelupusanSampahService = $tapakPelupusanSampahService;
        $this->pbtService = $pbtService;
    }
    
    public function index(Request $request)
    {
        $tapak_pelupusan_sampahs = $this->tapakPelupusanSampahService->filterRows($request->get('nama_tempat'), $request->get('kaedah_pelupusan'), $request->get('aktif'));
        return view('setup.tapak_pelupusan_sampah.index', compact('tapak_pelupusan_sampahs'));
    }
    
    public function create()
    {
        return view('setup.tapak_pelupusan_sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTapakPelupusanSampahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tapaks = $this->tapakPelupusanSampahService->getRecord($id);
        return view('setup.tapak_pelupusan_sampah.edit', $tapaks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
