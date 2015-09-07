<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;
use Pur\Purmoduler\Regnskap\Formelregner;
use Pur\Purmoduler\Regnskap\Konto;
use Pur\Services\Purmoduler\Regnskap\RegnskapOppgaveTjeneste;

class BilagsmalsekvensController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('laerer');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function opplist()
    {
        $oppgaver = Oppgave::get();

        return view('oppgaver.opplist', compact('oppgaver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function opprett()
    {
        return view('purmoduler.regnskap.bilagsmalsekvenser.opprett');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function lagre(Request $request)
    {
        $oppgaveTjeneste = new RegnskapOppgaveTjeneste();

        $oppgaveTjeneste->opprett($request, Auth::user());

        flash('Oppgaven ble opprettet');

        return redirect()->route('regnskap.oppgaver.opplist');
    }

    /**
     * Display the specified resource.
     *
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function vis(Bilagsmalsekvens $bilagsmalsekvens)
    {
        return view('purmoduler.regnskap.bilagsmalsekvenser.vis', compact('bilagsmalsekvens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function rediger(Bilagsmalsekvens $bilagsmalsekvens)
    {
        $selectKontoer = Konto::alleSomKodeNavnTabell();

        $selectFormler = Formelregner::navnAlleFormler();

        return view('purmoduler.regnskap.bilagsmalsekvenser.rediger',
               compact('bilagsmalsekvens', 'selectKontoer', 'selectFormler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function oppdater(Bilagsmalsekvens $bilagsmalsekvens, Request $request)
    {
        $oppgaveTjeneste = new RegnskapOppgaveTjeneste();

        $oppgaveTjeneste->oppdater($bilagsmalsekvens, $request);

        return redirect()->route('regnskap.oppgaver.rediger', compact('bilagsmalsekvens'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function slett(Bilagsmalsekvens $bilagsmalsekvens)
    {
        $bilagsmalsekvens->oppgave->delete();
        // app/Providers/EventServiceProvider sørger for å slette
        // bilagsmalsekvensen når dens tilhørende oppgave slettes

        flash('Oppgaven ble slettet');

        return redirect('/regnskap/oppgaver');
    }

}
