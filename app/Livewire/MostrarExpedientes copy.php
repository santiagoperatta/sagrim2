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
			$expediente->update(['enviado' => 1]);
			session()->flash('mensaje', '¡Tu expediente se envió con éxito!');
		} else {
			session()->flash('error', 'No se pudo encontrar el expediente seleccionado.');
		}
	
		// Actualizar $this->expediente con el siguiente expediente disponible
		$this->expediente = Expediente::where('estado', 0)->first();
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
			// Si el usuario es administrador, mostrar expedientes enviados
			$query->where('enviado', 1);
		} else {
			// Si el usuario no es administrador, mostrar expedientes no enviados
			$query->where('enviado', 0);
		}
	
		$expedientes = $query->paginate(5);
		return view('livewire.mostrar-expedientes', [
			'expedientes' => $expedientes
		]);
	}
}