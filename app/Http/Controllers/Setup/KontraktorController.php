<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StoreKontraktorRequest;
use App\Http\Requests\StorePbtKontraktorRequest;
use App\Models\Kontraktor;
use App\Services\DaerahService;
use App\Services\KontraktorService;
use App\Services\PbtService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    public KontraktorService $kontraktorService;
    public PbtService $pbtService;
    public DaerahService $daerahService;

    public function __construct(KontraktorService $kontraktorService, PbtService $pbtService, DaerahService $daerahService)
    {
        $this->daerahService = $daerahService;
        $this->kontraktorService = $kontraktorService;
        $this->pbtService = $pbtService;
    }

    public function index(Request $request)
    {
        $pbts = $this->pbtService->getPbtDropdown();
        $kontraktors = $this->kontraktorService->filterRows(
            $request->get('kodpbt'),
            $request->get('nama'),
            $request->get('aktif')
        );

        return view('setup.kontraktor.index', compact('pbts', 'kontraktors'));
    }

    public function create()
    {
        $daerahs = $this->daerahService->getDaerahDropdown();
        return view('setup.kontraktor.create', compact('daerahs'));
    }

    public function store(StoreKontraktorRequest $request)
    {
        $this->kontraktorService->store($request->validated());
        session()->flash('flash.banner', $request->nama . ' telah disimpan.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.kontraktor.index');
    }

    public function view($id)
    {
        $kontraktor = $this->kontraktorService->getRecord($id);
        return view('setup.kontraktor.view', compact('kontraktor'));
    }

    public function edit($id)
    {
        $pbts = $this->pbtService->getPbtDropdown();
        $daerahs = $this->daerahService->getDaerahDropdown();
        $kontraktor = $this->kontraktorService->getRecord($id);
        return view('setup.kontraktor.edit', compact(['pbts', 'daerahs']))->with('kontraktor', $kontraktor);
    }

    public function update(StoreKontraktorRequest $request, $id)
    {
        $this->kontraktorService->update($request->validated(), $id);
        session()->flash('flash.banner', $request->nama . ' telah dikemaskini.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('setup.kontraktor.index');
    }

    public function createPbtKontraktor($id)
    {
            $pbts = $this->pbtService->getPbtDropdown();
            $kontraktor = $this->kontraktorService->getRecord($id);
            $pbtKontraktor = $kontraktor->pbtKontraktors;
            return view('setup.kontraktor.createPbtKontraktor', compact(['pbts','pbtKontraktor']))->with('kontraktor', $kontraktor);
    }

    public function storePbtKontraktor(StorePbtKontraktorRequest $request, $id)
    {
        try {
            $this->kontraktorService->createPbtKontraktor($request->validated());
            session()->flash('flash.banner', $request->kod_pbt . ' telah dikemaskini.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect( route('setup.kontraktor.index'));
        } catch (QueryException $err) {
            session()->flash('flash.banner', $err->getPrevious()->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        } catch (Exception $err ) {
            session()->flash('flash.banner', $err->getCode());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return back()->withInput();
    }

    public function destroy(Kontraktor $pbt)
    {
        $pbt->delete();
        return redirect()->route('setup.kontraktor.index');
    }
}
