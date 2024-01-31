<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;

class ExpedientesVisados extends Component
{	
	public Expediente $expediente;

	public function enviarControlPrevio($expedienteId)
	{
		$expediente = Expediente::find($expedienteId);
	
		if ($expediente) {
			$expediente->update(['controlprevio' => 1]);
		}

		session()->flash('mensaje', '¡Tu expediente se envió con éxito!');

		// Actualizar $this->expediente con el siguiente expediente disponible
		$this->expediente = Expediente::where('estado', 0)->first();

        return redirect(route('expedientes-visados.show'));
	}

    public function render()
    {
        // Obtener el ID del usuario actualmente autenticado
        $userId = Auth::id();

        // Obtener los expedientes visados del usuario actual o aquellos que él mismo visó (si es administrador)
        $expedientes = Expediente::where('estado', 1)
            ->where(function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('admin_id', $userId);
            })
            ->paginate(5);

        return view('livewire.expedientes-visados', [
            'expedientes' => $expedientes
        ]);
    }
}