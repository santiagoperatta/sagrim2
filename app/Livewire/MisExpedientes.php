<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;

class MisExpedientes extends Component
{
    public function render()
    {
		$expedientes = Expediente::where('user_id', Auth::id())->paginate(5);
        return view('livewire.mis-expedientes', [
            'expedientes' => $expedientes
        ]);
    }
}
