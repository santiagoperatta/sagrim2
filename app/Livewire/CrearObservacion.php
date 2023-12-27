<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use App\Models\Observacion;
use Illuminate\Support\Facades\Auth;

class CrearObservacion extends Component
{
	public $comentario;
	public $expedienteId;
    public $expediente_id;

	protected $rules = [
		'comentario' => 'required',
		'expediente_id' => 'required'
	];
	
	public function crearObservacion(){
		$datos = $this->validate();
		
		$observacion = Observacion::create([
            'user_id' => auth()->user()->id,
			'comentario' => $datos['comentario'],
			'expediente_id' => $datos['expediente_id'],
		]);

		$this->expedienteId = $observacion->expediente_id;

	}

	public function render()
	{
		$observacions = Observacion::where('expediente_id', $this->expediente_id)->get();
		return view('livewire.crear-observacion', [
			'observacions' => $observacions
		]);
	}
}
