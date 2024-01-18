<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class MostrarPendientes extends Component
{
    public Expediente $expediente;

    public function render()
    {
        $user = auth()->user();
        $query = Expediente::where('estado', 0);

        if ($user->rol === 1) {
            // Si el usuario es administrador, mostrar expedientes enviados
            $query->where('enviado', 1)->where('admin_id', $user->id);
        } else {
            // Si el usuario no es administrador, mostrar expedientes no enviados
            $query->where('enviado', 0)->where('user_id', $user->id);
        }

        $expedientes = $query->paginate(5);
        return view('livewire.mostrar-expedientes', [
            'expedientes' => $expedientes
        ]);
    }
}