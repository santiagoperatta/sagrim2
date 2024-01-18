<?php

namespace App\Livewire;

use App\Models\Trabajo;
use Livewire\Component;
use App\Models\InfoTrabajo;
use App\Models\InfoPersonal;

class CrearInfoTrabajo extends Component
{
	public $nomenclatura;
	public $nro_cuenta;
	public $tipo_parcela;
	public $expedienteId;
    public $expediente_id;
	public $pasoActual=2;

	protected $rules = [
		'nomenclatura' => 'required',
		'nro_cuenta' => 'required',
		'tipo_parcela' => 'required',
		'expediente_id' => 'required'
	];
	
	public function crearInfoTrabajo(){
		$datos = $this->validate();

		//Crear tarea
		$InfoTrabajo = InfoTrabajo::create([
			'nomenclatura' => $datos['nomenclatura'],
			'nro_cuenta' => $datos['nro_cuenta'],
			'tipo_parcela' => $datos['tipo_parcela'],
			'expediente_id' => $datos['expediente_id'],
		]);

		$this->expedienteId = $InfoTrabajo->expediente_id;

		return redirect()->route('honorario.create', ['expedienteId' => $this->expedienteId]);

	}

    public function render()
    {
        return view('livewire.crear-info-trabajo');
    }
}
