<?php

namespace App\Http\Controllers;

use App\Models\InfoTrabajo;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoTrabajoController extends Controller
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
	public function create($expediente_id)
    {
        return view('info-trabajo.create', ['expediente_id' => $expediente_id]);
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
    public function show(InfoTrabajo $infoTrabajo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
	public function edit(InfoTrabajo $infoTrabajo)
	{
		return view('info-trabajo.edit', [
			'infoTrabajo' => $infoTrabajo
		]);
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
