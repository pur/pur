<?php namespace Pur\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Oppgavesett;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;

class OppgavesettController extends Controller {

    private $bruker;

    public function __construct()
    {
        $this->middleware('auth');
        $this->bruker = Auth::user();
    }

    /**
     * Vis oppgavesettene som er gjort tilgjengelige for innlogget student
     * og besvarelsene til studenten
     *
     * @param Oppgavesett $oppgavesett
     * @return Response
     */
	public function listOppForStudent(Oppgavesett $oppgavesett)
	{
        $oppgavesettsamling = $oppgavesett->publiserte()->get();

        $besvarelser = $this->bruker->besvarelser;

        return view('oppgavesett.list', compact('oppgavesettsamling', 'besvarelser'));
    }

    /**
     * Vis oppgavesettene som er tilhører innlogget lærer
     *
     * @return \Illuminate\View\View
     */
    public function listOppForLaerer()
	{
        $oppgavesettsamling = $this->bruker->oppgavesett;

        return view('oppgavesett.list', compact('oppgavesettsamling'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('oppgavesett.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param Oppgavesett $oppgavesett
     * @return Response
     */
	public function show(Oppgavesett $oppgavesett)
	{
        //return view('oppgavesett.testing.show', compact('oppgavesett'));
        return view('oppgavesett.show', compact('oppgavesett'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Oppgavesett $oppgavesett)
	{
        return view('oppgavesett.edit', compact('oppgavesett'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
