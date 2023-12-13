<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;

class MostrarExpediente extends Component
{
	public $expediente;
	public $archivos;
	public $nro_expediente;

    public function mount($expedienteId)
    {
        try {
            $this->expediente = Expediente::with(['infoPersonal', 'infoTrabajo', 'honorarios'])->findOrFail($expedienteId);
        } catch (\Exception $exception) {
            abort(404);
        }
    }


	public function render()
	{
		$archivos = scandir(public_path('/archivos'));
	
		return view('livewire.mostrar-expediente', compact('archivos'));
	}
}
