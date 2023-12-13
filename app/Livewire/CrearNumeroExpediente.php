<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;

class CrearNumeroExpediente extends Component
{
	public $expediente;
	public $expediente_id;
	public $nro_expediente;

	public function mount($expediente_id)
	{
		$this->expediente = Expediente::with(['infoPersonal', 'infoTrabajo', 'honorarios'])->findOrFail($expediente_id);
	}

	public function asignarNumeroExpediente()
	{
		// Asignar el número de expediente al modelo Expediente actual
		$this->expediente->nro_expediente = $this->nro_expediente;
		$this->expediente->save();
	
		session()->flash('mensaje', 'Número de expediente asignado con éxito.');
	}
    public function render()
    {
        return view('livewire.crear-numero-expediente');
    }
}
