<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisOperasiRequest;
use App\Models\JenisOperasi;
use Illuminate\Http\Request;

class JenisOperasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_operasis = JenisOperasi::paginate(5);
        return view('setup.jenis_operasi.index', compact('jenis_operasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.jenis_operasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisOperasiRequest $request)
    {
        JenisOperasi::create([
            'kod' => $request->validated()['kod_operasis'],
            'keterangan' => $request->validated()['keterangan_operasis'], 
        ]);
        session()->flash('flash.banner', $request->kod_operasis . ' telah disimpan.');
        session()->flash('flash.banner', $request->keterangan_operasis . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_operasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('setup.pbt.view', compact('pbt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
