<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;

class ExpedientesVisados extends Component
{
    public function render()
    {
		$expedientes = Expediente::where('estado', 1)->paginate(5);
        return view('livewire.expedientes-visados', [
            'expedientes' => $expedientes
        ]);
    }
}
