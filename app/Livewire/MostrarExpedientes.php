<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Livewire\Attributes\On;

class MostrarExpedientes extends Component
{
	public Expediente $expediente;

	#[On('eliminarExpediente')]
    public function eliminarExpediente( Expediente $id)
    {
		dd($id);
    }

    public function render()
    {
		
		//$expedientes = Expediente::where('user_id', auth()->user()->id)->paginate(10);
		//return view('livewire.mostrar-expedientes', [
		//	'expedientes' => $expedientes
		//]);

		$expedientes = Expediente::paginate(5);

        return view('livewire.mostrar-expedientes', [
            'expedientes' => $expedientes
        ]);
    }
}
