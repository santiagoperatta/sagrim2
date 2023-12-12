<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;

class MostrarExpediente extends Component
{
	public $expediente;
	public $nro_expediente;
	public $archivos;

    public function mount($expediente_id)
    {
        $this->expediente = Expediente::with(['infoPersonal', 'infoTrabajo', 'honorarios'])->findOrFail($expediente_id);
    }

    public function render()
    {
        return view('livewire.mostrar-expediente', compact('archivos'));
    }

	public function asignarNumeroExpediente()
    {
        $this->validate([
            'nro_expediente' => 'nullable|numeric',
        ]);

        // Actualiza el número de expediente en la base de datos
        $this->expediente->update([
            'nro_expediente' => $this->nro_expediente,
        ]);

        session()->flash('message', 'Número de expediente asignado correctamente.');

        // Actualiza la instancia del expediente después de la actualización
        $this->expediente = $this->expediente->fresh();
    }
	
}
