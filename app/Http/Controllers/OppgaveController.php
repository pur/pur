<?php namespace Pur\Http\Controllers;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Oppgave;

class OppgaveController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 */
	public function index(Oppgave $oppgave)
	{
		$oppgaver = $oppgave->get();
		return view('oppgaver.index', compact('oppgaver'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("oppgaver.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 */
	public function store(Oppgave $oppgave)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 * @internal param int $id
	 */
	public function show(Oppgave $oppgave)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Oppgave $oppgave)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 * @internal param int $id
	 */
	public function update(Oppgave $oppgave)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Oppgave $oppgave
	 * @return Response
	 * @internal param int $id
	 */
	public function destroy(Oppgave $oppgave)
	{
		//
	}
}
