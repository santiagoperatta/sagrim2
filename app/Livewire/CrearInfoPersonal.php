<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;

class CrearInfoPersonal extends Component
{
	public $nombre;
	public $dni;
	public $razon_social;
	public $cuit;
	public $expedienteId;
    public $expediente_id;

	public $pasoActual = 1;

	protected $rules = [
		'nombre' => 'required',
		'dni' => 'required',
		'cuit' => 'required',
		'razon_social' => 'required',
		'expediente_id' => 'required'
	];

	public function getIdTask(Request $request, $id)
	{ 
		$expedienteId = session('expedienteId');

		return view('info-personal.create', ['expedienteId' => $expedienteId]);
	}
	
	public function crearInfoPersonal(){
		$datos = $this->validate();

		//Crear tarea
		$infoPersonal = InfoPersonal::create([
			'nombre' => $datos['nombre'],
			'dni' => $datos['dni'],
			'cuit' => $datos['cuit'],
			'razon_social' => $datos['razon_social'],
			'expediente_id' => $datos['expediente_id'],
		]);	

		$this->expedienteId = $infoPersonal->expediente_id;

		return redirect()->route('info-trabajo.create', ['expedienteId' => $this->expedienteId]);

	}

    public function render()
    {
        return view('livewire.crear-info-personal');
    }
}
