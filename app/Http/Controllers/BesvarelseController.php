<?php namespace Pur\Http\Controllers;

use Pur\Besvarelse;
use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BesvarelseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Besvarelse $besvarelse
     * @return Response
     */
	public function index(Besvarelse $besvarelse)
	{
		$besvarelser = $besvarelse->get();

        return view('besvarelser.testing.list', compact('besvarelser'));
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
     * @param Besvarelse $besvarelse
     * @return Response
     */
	public function show(Besvarelse $besvarelse)
	{
        return view('besvarelser.testing.show', compact('besvarelse'));
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
