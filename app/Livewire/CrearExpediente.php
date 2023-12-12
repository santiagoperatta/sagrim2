<?php

namespace App\Livewire;

use App\Models\Expediente;
use Livewire\Component;

class CrearExpediente extends Component
{
    public $estado;
    public $expedienteId;
	public $nro_expediente;

    protected $rules = [
        'estado' => 'nullable|boolean',
		'nro_expediente' => 'nullable|numeric'
    ];

    public function crearExpediente()
    {
        $datos = $this->validate();

        $expediente = Expediente::create([
            'estado' => $datos['estado'] ?? false,
            'user_id' => auth()->user()->id,
			'nro_expediente' => $datos['nro_expediente'] ?? false,
        ]);

		$this->expedienteId = $expediente->id;

		return redirect()->route('info-personal.create', ['expedienteId' => $expediente->id]);
    }

    public function render()
    {
        return view('livewire.crear-expediente');
    }
}