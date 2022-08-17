<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisJenterasRequest;
use App\Models\JenisJenteras;
use Illuminate\Http\Request;

class JenisJenterasController extends Controller
{
    public function index()
    {
        $jenis_jenteras = JenisJenteras::paginate(5);
        return view('setup.jenis_jentera.index', compact('jenis_jenteras'));
    }

    public function create()
    {
        return view('setup.jenis_jentera.create');
    }

    public function store(StoreJenisJenterasRequest $request)
    {
        Jenisjenteras::create([
            'kod' => $request->validated()['kod_jentera'],
            'keterangan' => $request->validated()['keterangan_jentera'],
        ]);
        session()->flash('flash.banner', $request->kod_jentera . ' telah disimpan.');
        session()->flash('flash.banner', $request->keterangan_jentera . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_jentera.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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
