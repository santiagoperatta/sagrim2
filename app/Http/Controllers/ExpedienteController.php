<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$this->authorize('viewAny', Expediente::class);
        return view('expedientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('expedientes.create');
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
	public function show(Expediente $expediente)
	{
		$expediente->load('infoPersonal');
	
		return view('expedientes.show', [
			'expediente' => $expediente,
		]);
	}
    /**
     * Show the form for editing the specified resource.
     */
	public function edit(Expediente $expediente)
	{
		$this->authorize('update', $expediente);
	
		return view('expedientes.edit', [
			'expediente' => $expediente
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
