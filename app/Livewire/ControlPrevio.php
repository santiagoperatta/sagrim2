<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;

class ControlPrevio extends Component
{
    public Expediente $expediente;

    public function render()
    {
        $user = auth()->user();
        $query = Expediente::where('estado', 1);

        if ($user->rol === 3) {
            $query->where('controlprevio', 1);
        } else {
            // Si el usuario no es administrador, mostrar expedientes no enviados
            $query->where('enviado', 0)->where('user_id', $user->id);
        }

        $expedientes = $query->paginate(5);
        return view('livewire.control-previo', [
            'expedientes' => $expedientes
        ]);
    }
}
