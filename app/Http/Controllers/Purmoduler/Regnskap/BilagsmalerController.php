<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;

class BilagsmalerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Bilagsmal $bilagsmal
     * @param Bilagssekvens $bilagssekvens
     * @return Response
     */
	public function index(Bilagsmal $bilagsmal)
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bilagsmaler.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Bilagsmal $bilagsmal
     * @return Response
     */
	public function store(Bilagsmal $bilagsmal)
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param Bilagsmal $bilagsmal
     * @return Json
     */
	public function show(Bilagsmal $bilagsmal)
	{
		//return $bilagsmal;
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bilagsmal $bilagsmal
     * @return Response
     * @internal param int $id
     */
	public function edit(Bilagsmal $bilagsmal)
	{
		//
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Bilagsmal $bilagsmal
     * @param Request $request
     * @internal param int $id
     */
	public function update(Bilagsmal $bilagsmal, Request $request)
	{
        $bilagsmal->fill($request->all())->save();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Bilagsmal $bilagsmal
     * @return Response
     * @internal param int $id
     */
	public function destroy(Bilagsmal $bilagsmal)
	{
		//
	}

}
