<?php

namespace App\Http\Controllers;

use App\Models\Honorario;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HonorarioController extends Controller
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
		$expedienteId = session('expedienteId');

		return view('honorario.create', ['expediente_id' => $expediente_id]);
    }

	public function getIdTask(Request $request, $id, $expediente_id)
	{
		$expedienteId = session('expedienteId');
		return view('honorario.create',['expediente_id' => $id, 'expediente_id' => $expediente_id]);
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
	public function edit(Honorario $honorario)
	{
		return view('honorario.edit', [
			'honorario' => $honorario
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
