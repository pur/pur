<?php

namespace Pur\Http\Controllers\Purmoduler\KoiAnalyse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Pur\Bruker;
use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;
use Pur\Purmoduler\KoiAnalyse\Instans;
use Pur\Purmoduler\KoiAnalyse\Oppgave;
use Pur\Services\Purmoduler\KoiAnalyse\OppgaveTjeneste;

class InstansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function generer(Request $request)
    {
        $oppgave = Oppgave::find($request->get('oppgave-id'));
        $bruker = Bruker::find(4);  // TODO: Auth::user();

        $oppgavetjeneste = new OppgaveTjeneste();
        $instans = $oppgavetjeneste->instansier($oppgave, $bruker);

        return redirect()->route('koi-analyse.instanser.rediger', compact('instans'));
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
    public function rediger(Instans $instans)
    {
        return view('purmoduler.koi-analyse.instanser.rediger', compact('instans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function oppdater(Request $request, $id)
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
