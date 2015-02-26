<?php namespace Pur\Http\Controllers\Purmoduler\Regnskap;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Pur\Purmoduler\Regnskap\Posteringsmal;

class PosteringsmalController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Posteringsmal $posteringsmal
     * @return Response
     */
	public function index(Posteringsmal $posteringsmal)
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
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Posteringsmal $posteringsmal
     * @return Response
     */
	public function store(Posteringsmal $posteringsmal)
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param Posteringsmal $posteringsmal
     * @return Response
     */
	public function show(Posteringsmal $posteringsmal)
	{
		//
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Posteringsmal $posteringsmal
     * @return Response
     */
	public function edit(Posteringsmal $posteringsmal)
	{
		//
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Posteringsmal $posteringsmal
     * @param Request $request
     * @return Response
     */
	public function update(Posteringsmal $posteringsmal, Request $request)
	{
        $posteringsmal->fill($request->all())->save();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Posteringsmal $posteringsmal
     * @return Response
     */
	public function destroy(Posteringsmal $posteringsmal)
	{
		//
	}

}
