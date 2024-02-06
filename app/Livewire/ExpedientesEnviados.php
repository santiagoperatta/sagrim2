<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;

class ExpedientesEnviados extends Component
{	
	public Expediente $expediente;

    public function render()
    {
        // Obtener el ID del usuario actualmente autenticado
        $userId = Auth::id();

        // Obtener los expedientes visados del usuario actual o aquellos que él mismo visó (si es administrador)
        $expedientes = Expediente::where('enviado', 1)
            ->where(function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('admin_id', $userId);
            })
            ->paginate(5);

        return view('livewire.expedientes-enviados', [
            'expedientes' => $expedientes
        ]);
    }
}