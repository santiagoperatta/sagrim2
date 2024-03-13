<?php

namespace App\Livewire;

use ZipArchive;
use Livewire\Component;
use App\Models\Expediente;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class MostrarExpediente extends Component
{
	public $expediente;
	public $archivos;
	public $nro_expediente;

    public function mount($expedienteId)
    {
        try {
            $this->expediente = Expediente::with(['infoPersonal', 'infoTrabajo', 'honorarios'])->findOrFail($expedienteId);
        } catch (\Exception $exception) {
            abort(404);
        }
    }

	public function render()
	{
        $archivos = Storage::files('public/archivos');
	
		return view('livewire.mostrar-expediente', compact('archivos'));
	}
}
