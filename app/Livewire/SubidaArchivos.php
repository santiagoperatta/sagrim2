<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SubidaArchivos extends Component
{
    use WithFileUploads;

	public $expediente;
	public $expediente_id;
	public $expedienteId;
    public $archivoCaja;
    public $archivoInformeVEP;
    public $lamina1;
    public $lamina2;
    public $lamina3;
	public $pasoActual=4;

    protected $rules = [
        'archivoCaja' => 'required|mimes:pdf',
        'archivoInformeVEP' => 'required|mimes:pdf',
        'lamina1' => 'required|mimes:pdf',
        'lamina2' => 'required|mimes:pdf',
        'lamina3' => 'required|mimes:pdf',
    ];
	
    public function mount($expediente_id)
    {
        $this->expediente_id = $expediente_id;
    }

	public function subirArchivos()
	{
		$this->validate();
	
		$carpetaExpediente = 'public/archivos/expediente' . $this->expediente_id;
	
		if (!Storage::exists($carpetaExpediente)) {
			Storage::makeDirectory($carpetaExpediente);
		}
	
		$archivoCaja = $this->archivoCaja->storeAs($carpetaExpediente, 'archivoCaja_exp' . $this->expediente_id . '.pdf');
		$archivoInformeVEP = $this->archivoInformeVEP->storeAs($carpetaExpediente, 'archivoInformeVEP_exp' . $this->expediente_id . '.pdf');
		$lamina1 = $this->lamina1->storeAs($carpetaExpediente, 'lamina1_exp' . $this->expediente_id . '.pdf');
		$lamina2 = $this->lamina2->storeAs($carpetaExpediente, 'lamina2_exp' . $this->expediente_id . '.pdf');
		$lamina3 = $this->lamina3->storeAs($carpetaExpediente, 'lamina3_exp' . $this->expediente_id . '.pdf');
	
		session()->flash('mensaje', 'Tus archivos se guardaron con éxito, recuerda que una vez terminado el tramite, debes enviarlo');
		return redirect()->route('dashboard');
	}


	public function render()
    {
        return view('livewire.subida-archivos');        
    }
}