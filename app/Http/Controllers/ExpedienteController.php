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

	public function getIdTask(Request $request, $id)
	{
		return view('expedientes.create', ['expediente_id' => $id]);
	}

    /**
     * Display the specified resource.
     */
	public function show($id)
	{
		return view('expedientes.show', ['expediente_id' => $id]);
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
	public function update(Request $request, $id)
	{
		$expediente = Expediente::findOrFail($id);
	
		$request->validate([
			'numero_expediente' => 'nullable|numeric',
		]);
	
		$expediente->update([
			'nro_expediente' => $request->input('numero_expediente'),
		]);
	
		return redirect()->route('expedientes.show', $id)->with('success', 'Número de expediente añadido correctamente.');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
