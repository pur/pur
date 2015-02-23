<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Purmoduler\Regnskap\Bilagssekvens;

class BilagssekvensController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @param Bilagssekvens $bilagssekvens
	 * @return Response
	 */
	public function index(Bilagssekvens $bilagssekvens)
	{
        $bilagssekvenser = $bilagssekvens->get();
		return view('purmoduler.regnskap.bilagssekvenser.index', compact('bilagssekvenser'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view("purmoduler.regnskap.bilagssekvenser.inngaaende-faktura.create");
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
