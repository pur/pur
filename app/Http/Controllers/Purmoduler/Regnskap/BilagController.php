<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Konto;

class BilagController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Bilag $bilag
     * @return Response
     */
	public function index(Bilag $bilag)
	{
		$bilagsett = $bilag->get();
        return view('purmoduler.regnskap.bilag.testing.index', compact('bilagsett'));
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
     * @param Bilag $bilag
     * @return Response
     */
	public function show(Bilag $bilag)
	{
        return view('purmoduler.regnskap.bilag.testing.show', compact('bilag'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bilag $bilag
     * @return Response
     */
	public function edit(Bilag $bilag)
	{
        $selectKontoer = Konto::alleSomKodeNavnTabell();
        return view('purmoduler.regnskap.bilag.testing.edit', compact('bilag', 'selectKontoer'));
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
