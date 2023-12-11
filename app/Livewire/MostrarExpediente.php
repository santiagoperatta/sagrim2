<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarExpediente extends Component
{
	public $expediente;
	
    public function render()
    {
        return view('livewire.mostrar-expediente');
    }
}
