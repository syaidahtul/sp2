<?php

namespace App\Http\Controllers\PbtProfail;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLokasiRequest;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::paginate(10);
        return view('profailpbt.lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        return view('profailpbt.lokasi.create');
    }

    public function store(StoreLokasiRequest $request)
    {
        Lokasi::create($request->all());
        session()->flash('flash.banner', 'Yay for free components!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('profailpbt.lokasi.index');
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

    public function destroy($id)
    {
        //
    }
}
