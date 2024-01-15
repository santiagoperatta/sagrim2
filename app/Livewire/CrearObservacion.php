<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use App\Models\Observacion;
use App\Notifications\NuevaCorreccion;
use Illuminate\Support\Facades\Auth;

class CrearObservacion extends Component
{
    public $comentario;
    public $expedienteId;
    public $expediente_id;

    protected $rules = [
        'comentario' => 'required',
        'expediente_id' => 'required',
    ];

    public function crearObservacion()
    {
        $datos = $this->validate();

        $observacion = Observacion::create([
            'user_id' => auth()->user()->id,
            'comentario' => $datos['comentario'],
            'expediente_id' => $datos['expediente_id'],
        ]);

        // Obtener el usuario actual
        $usuarioActual = auth()->user();

        $mensaje = ($usuarioActual->rol == 1)
            ? 'Corrección enviada al profesional'
            : 'Tu mensaje fue enviado al visador, pero recuerda que debes enviar el trámite para que pueda verlo';

        if ($usuarioActual->rol == 1) {
            $expediente = Expediente::find($observacion->expediente_id);

            if ($expediente) {
                $expediente->update(['enviado' => 0]);
            }
        }

        $this->expedienteId = $observacion->expediente_id;

        // Redirigir al dashboard con un mensaje flash
        return redirect(route('dashboard'))->with('mensaje', $mensaje);
    }

    public function render()
    {
        $expediente = Expediente::find($this->expediente_id);
        $observacions = Observacion::where('expediente_id', $this->expediente_id)->get();

        return view('livewire.crear-observacion', [
            'observacions' => $observacions,
            'expediente' => $expediente,
        ]);
    }
}