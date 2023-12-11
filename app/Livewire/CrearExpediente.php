<?php

namespace App\Livewire;

use App\Models\Expediente;
use Livewire\Component;

class CrearExpediente extends Component
{
    public $estado;
    public $expedienteId;

    protected $rules = [
        'estado' => 'nullable|boolean',
    ];

    public function crearExpediente()
    {
        $datos = $this->validate();

        $expediente = Expediente::create([
            'estado' => $datos['estado'] ?? false,
            'user_id' => auth()->user()->id,
        ]);

		$this->expedienteId = $expediente->id;

		return redirect()->route('info-personal.create', ['expedienteId' => $expediente->id]);
    }

    public function render()
    {
        return view('livewire.crear-expediente');
    }
}