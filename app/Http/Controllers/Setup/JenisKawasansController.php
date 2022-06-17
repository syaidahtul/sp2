<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreJenisKawasansRequest;
use App\Models\JenisKawasans;
use Illuminate\Http\Request;

class JenisKawasansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kawasans = JenisKawasans::paginate(5);
        return view('setup.jenis_kawasan.index', compact('jenis_kawasans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.jenis_kawasan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisKawasansRequest $request)
    {
        Jeniskawasans::create([
            'kod' => $request->validated()['kod_kawasan'],
            'keterangan' => $request->validated()['keterangan_kawasan'], 
        ]);
        session()->flash('flash.banner', $request->kod_kawasan . ' telah disimpan.');
        session()->flash('flash.banner', $request->keterangan_kawasan . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.jenis_kawasan.index');
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
