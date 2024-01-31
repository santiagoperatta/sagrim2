<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class MostrarExpedientes extends Component
{
    public Expediente $expediente;

	public function enviarExpediente($expedienteId)
	{
		$expediente = Expediente::find($expedienteId);
	
		if ($expediente) {
			$expediente->update(['tiene_observacion' => 0]);
			$expediente->update(['enviado' => 1]);
		}

		session()->flash('mensaje', '¡Tu expediente se envió con éxito!');
		// Actualizar $this->expediente con el siguiente expediente disponible
		$this->expediente = Expediente::where('estado', 0)->first();

        return redirect(route('dashboard'));
	}

	public function abrirExpediente($expedienteId)
    {

		$expediente = Expediente::find($expedienteId);

		// Verificar si el usuario actual tiene rol 1 (administrador)
		if (auth()->user()->rol === 1 && $expediente) {
			// Asignar el admin_id del usuario actual al expediente
			$expediente->admin_id = auth()->user()->id;
			$expediente->save();
		}

		
    }
	
	public function render()
	{
		$user = auth()->user();
		$query = Expediente::where('estado', 0);

		if ($user->rol === 1) {
			$query->where('enviado', 1)->where('admin_id', null);
		} elseif ($user->rol === 2) {
			$query->where('enviado', 0)->where('user_id', $user->id);
		}

		$expedientes = $query->paginate(5);
		return view('livewire.mostrar-expedientes', [
			'expedientes' => $expedientes
		]);
	}
}