<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SubidaArchivos extends Component
{
    use WithFileUploads;

    public $archivoCaja;
    public $archivoInformeVEP;
    public $lamina1;
    public $lamina2;
    public $lamina3;

    protected $rules = [
        'archivoCaja' => 'required|mimes:pdf',
        'archivoInformeVEP' => 'required|mimes:pdf',
        'lamina1' => 'required|mimes:pdf',
        'lamina2' => 'required|mimes:pdf',
        'lamina3' => 'required|mimes:pdf',
    ];

    public function subirArchivos()
    {
        $this->validate();

		$archivoCaja = $this->archivoCaja->store('public/archivos');
		$archivoInformeVEP = $this->archivoInformeVEP->store('public/archivos');
		$lamina1 = $this->lamina1->store('public/archivos');
		$lamina2 = $this->lamina2->store('public/archivos');
		$lamina3 = $this->lamina3->store('public/archivos');

        session()->flash('mensaje', 'Tus archivos se guardaron con éxito.');
		return redirect()->route('dashboard');
    }


	public function render()
    {
        return view('livewire.subida-archivos');        
    }
}