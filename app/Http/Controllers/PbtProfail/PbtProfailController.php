<?php

namespace App\Http\Controllers\PbtProfail;

use App\Http\Controllers\Controller;
use App\Models\Pbt;
use App\Services\PbtService;
use App\Services\ProfailPbtService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PbtProfailController extends Controller
{
    
    public ProfailPbtService $profailPbtService;
    public PbtService $pbtService;

    public function __construct(ProfailPbtService $profailPbtService, PbtService $pbtService)
    {
        $this->profailPbtService = $profailPbtService;
        $this->pbtService = $pbtService;
    }
    
    public function index(Request $request)
    {
        if ($request->has('kod') && Auth::user()->current_pbt === 'KKTP' ) {

        }

        $pbt = Pbt::with('users')->where('kod', Auth::user()->current_pbt)->first();
        return view('profailpbt.index', compact('pbt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
