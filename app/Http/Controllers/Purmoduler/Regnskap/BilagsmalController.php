<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pur\Purmoduler\Regnskap\Bilagsmal;

class BilagsmalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('laerer');
    }

    /**
     * Lagre endringer i bilagsmal
     *
     * @param Bilagsmal $bilagsmal
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oppdater(Bilagsmal $bilagsmal, Request $request)
    {
        $bilagsmal->fill($request->all())->save();

        $bilagsmalsekvens = $bilagsmal->bilagsmalsekvens;

        return redirect()->route('regnskap.oppgaver.rediger', compact('bilagsmalsekvens'));
    }
}
