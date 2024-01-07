<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoPersonalController extends Controller
{
    public function index()
    {

    }
    public function create($expediente_id)
    {
		return view('info-personal.create', ['expediente_id' => $expediente_id]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(InfoPersonal $infoPersonal)
    {

    }

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
