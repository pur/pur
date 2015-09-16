<?php

namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Illuminate\Http\Request;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;
use Pur\Purmoduler\Regnskap\Konto;

class KontoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('laerer');
        // TODO: begrens til admin-brukere
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function opplist()
    {
        $kontoer = Konto::withTrashed()->get();

        return view('purmoduler.regnskap.kontoer.opplist', compact('kontoer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function opprett()
    {
        return view('purmoduler.regnskap.kontoer.opprett');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function lagre(Request $request)
    {
        // TODO: Flytt validering til egen valideringsklasse for gjenbruk i oppdater()
        $this->validate($request, [
            'kontokode' => 'required|unique:kontoer|digits:4',
            'kontonavn' => 'required|max:90'
        ]);

        Konto::create($request->all());

        flash('Konto ' . $request->input('kontokode') . ' ble opprettet');

        return redirect()->route('regnskap.kontoer.opplist');
    }

    /**
     * Display the specified resource.
     *
     * @param Konto $konto
     * @return Response
     */
    public function vis(Konto $konto)
    {
        return "Vis konto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Konto $konto
     * @return Response
     */
    public function rediger(Konto $konto)
    {
        return "Rediger konto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Konto $konto
     * @param  Request $request
     * @return Response
     */
    public function oppdater(Konto $konto, Request $request)
    {
        return "Oppdater konto";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Konto $konto
     * @return Response
     * @throws \Exception
     */
    public function slett(Konto $konto)
    {
        $konto->delete();

        flash('Konto ' . $konto->kontokode . ' ble fjernet');

        return redirect()->route('regnskap.kontoer.opplist');
    }

    /**
     * Recover the specified resource
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function gjenopprett(Request $request)
    {
        $konto = Konto::withTrashed()->find($request->input('kontokode'));

        $konto->restore();

        flash('Konto ' . $konto->kontokode . ' ble gjenopprettet');

        return redirect()->route('regnskap.kontoer.opplist');
    }
}
