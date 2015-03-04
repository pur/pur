<?php namespace Pur\Http\Controllers;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Oppgavesett;

class OppgavesettController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Oppgavesett $oppgavesett
     * @return Response
     */
	public function index(Oppgavesett $oppgavesett)
	{
        $alleoppgavesett = $oppgavesett->get();
        return view('oppgavesett.testing.list', compact('alleoppgavesett'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
        return view('oppgavesett.testing.show', compact('oppgavesett'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
