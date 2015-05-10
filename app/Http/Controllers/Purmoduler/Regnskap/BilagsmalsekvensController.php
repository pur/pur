<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

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
    public function create()
    {
        //return view("purmoduler.regnskap.bilagsmalsekvenser.inngaaende-faktura.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Bilagsmalsekvens $bilagsmalsekvens)
    {
        //
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
        //return view('purmoduler.regnskap.bilagsmalsekvenser.testing.show', compact('bilagsmalsekvens'));
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
        //return view('purmoduler.regnskap.bilagsmalsekvenser.testing.edit', compact('bilagsmalsekvens', 'selectKontoer'));
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
