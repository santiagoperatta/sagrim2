<?php

namespace App\Livewire;

use App\Models\Expediente;
use Livewire\Component;

class MostrarExpedientes extends Component
{

	protected $listeners=['eliminarExpediente'];

	public function eliminarExpediente(Expediente $expediente){
		$expediente->delete();
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
