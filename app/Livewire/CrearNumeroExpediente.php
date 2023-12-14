<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use App\Notifications\ExpedienteVisado;

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
		$this->expediente->estado= 1;
		$this->expediente->nro_expediente = $this->nro_expediente;
		$this->expediente->save();	
		session()->flash('mensaje', 'Número de expediente asignado con éxito.');
		$this->expediente->profesional->notify(new ExpedienteVisado($this->expediente->id, auth()->user()->id));
	}
    public function render()
    {
        return view('livewire.crear-numero-expediente');
    }
}
