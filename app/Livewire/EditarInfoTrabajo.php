<?php

namespace App\Livewire;

use App\Models\Trabajo;
use Livewire\Component;
use App\Models\InfoTrabajo;
use App\Models\InfoPersonal;

class EditarInfoTrabajo extends Component
{
	public $infoTrabajo_id;
	public $nomenclatura;
	public $nro_cuenta;
	public $tipo_parcela;
    public $expediente_id;
	public $pasoActual=2;

	protected $rules = [
		'nomenclatura' => 'required',
		'nro_cuenta' => 'required',
		'tipo_parcela' => 'required',
		'expediente_id' => 'required'
	];

	public function mount(InfoTrabajo $infoTrabajo){
		$this->infoTrabajo_id = $infoTrabajo->id;
		$this->expediente_id = $infoTrabajo->expediente_id;
		$this->nomenclatura = $infoTrabajo->nomenclatura;
		$this->nro_cuenta = $infoTrabajo->nro_cuenta;
		$this->tipo_parcela = $infoTrabajo->tipo_parcela;
	}
	
	public function editarInfoTrabajo(){
		$datos = $this->validate();

		$infoTrabajo = InfoTrabajo::find($this->infoTrabajo_id);

		$infoTrabajo->nomenclatura = $datos['nomenclatura'];
		$infoTrabajo->nro_cuenta = $datos['nro_cuenta'];
		$infoTrabajo->tipo_parcela = $datos['tipo_parcela'];
	
		$infoTrabajo->save();

		return redirect()->route('honorario.create', ['expedienteId' => $this->expediente_id]);

	}

    public function render()
    {
        return view('livewire.editar-info-trabajo');
    }
}
