<?php

namespace App\Livewire;

use App\Models\InfoTrabajo;
use Livewire\Component;

class CrearInfoTrabajo extends Component
{
	public $nomenclatura;
	public $nro_cuenta;
	public $datos;
	public $tipo_parcela;
	public $tasa_colegio;
	public $expedienteId;
    public $expediente_id;


	protected $rules = [
		'nomenclatura' => 'required',
		'nro_cuenta' => 'required',
		'datos' => 'required',
		'tipo_parcela' => 'required',
		'tasa_colegio' => 'required',
		'expediente_id' => 'required'
	];
	
	public function crearInfoTrabajo(){
		$datos = $this->validate();

		//Crear tarea
		$InfoTrabajo = InfoTrabajo::create([
			'nomenclatura' => $datos['nomenclatura'],
			'nro_cuenta' => $datos['nro_cuenta'],
			'datos' => $datos['datos'],
			'tipo_parcela' => $datos['tipo_parcela'],
			'tasa_colegio' => $datos['tasa_colegio'],
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
