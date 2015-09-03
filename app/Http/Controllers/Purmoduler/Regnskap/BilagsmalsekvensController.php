<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;
use Pur\Purmoduler\Regnskap\Formelregner;
use Pur\Purmoduler\Regnskap\Konto;


class BilagsmalsekvensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     */
    public function index(Bilagsmalsekvens $bilagsmalsekvens)
    {
        $bilagsmalsekvenser = $bilagsmalsekvens->get();
        return view('purmoduler.regnskap.bilagsmalsekvenser.index', compact('bilagsmalsekvenser'));
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
     * @return Response
     */
    public function lagre(Request $request)
    {
        $bilagsmalsekvens = new Bilagsmalsekvens();
        $bilagsmalsekvens->motpart = $request->input('motpart');
        $bilagsmalsekvens->save();

        $oppgave = new Oppgave();
        $oppgave->beskrivelse = $request->input('beskrivelse');

        $oppgave->moduloppgave_type = 'Pur\Purmoduler\Regnskap\Bilagsmalsekvens';
        $oppgave->moduloppgave_id = $bilagsmalsekvens->id;

        $oppgave->skaper()->associate(Auth::user());
        $oppgave->save();

        flash('Oppgaven ble opprettet');

        return redirect()->route('oppgaver.opplist');
    }

    /**
     * Display the specified resource.
     *
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function show(Bilagsmalsekvens $bilagsmalsekvens)
    {
        return view('purmoduler.regnskap.bilagsmalsekvenser.show', compact('bilagsmalsekvens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function edit(Bilagsmalsekvens $bilagsmalsekvens)
    {
        $selectKontoer = Konto::alleSomKodeNavnTabell();

        $selectFormler = Formelregner::navnAlleFormler();

        return view('purmoduler.regnskap.bilagsmalsekvenser.edit', compact('bilagsmalsekvens', 'selectKontoer', 'selectFormler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bilagsmalsekvens $bilagsmalsekvens
     * @return Response
     * @internal param int $id
     */
    public function update(Bilagsmalsekvens $bilagsmalsekvens, Request $request)
    {
        $bilagsmalsekvens->fill($request->all())->save();
        $bilagsmalsekvens->oppgave->fill($request->all())->save();

        return view('purmoduler.regnskap.bilagsmalsekvenser.testing.show', compact('bilagsmalsekvens'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Bilagsmalsekvens $bilagsmalsekvens)
    {
        //
    }

}
