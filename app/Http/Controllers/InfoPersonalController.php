<?php

namespace App\Http\Controllers;

use App\Models\InfoPersonal;
use Illuminate\Http\Request;

class InfoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$expedienteId = session('expedienteId');

		return view('info-personal.create', ['expedienteId' => $expedienteId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoPersonal $infoPersonal)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
	public function edit(InfoPersonal $infoPersonal)
	{

	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
