<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;

class EditarInfoPersonal extends Component
{
	public $infoPersonal_id;
	public $nombre;
	public $dni;
	public $razon_social;
	public $expediente_id;
	public $cuit;

	public $pasoActual = 1;

	protected $rules = [
		'nombre' => 'required', 
		'dni' => 'required',
		'cuit' => 'required',
		'expediente_id' => 'required',
		'razon_social' => 'required',
	];

	public function mount(InfoPersonal $infoPersonal){
		$this->infoPersonal_id = $infoPersonal->id;
		$this->expediente_id = $infoPersonal->expediente_id;
		$this->nombre = $infoPersonal->nombre;
		$this->dni = $infoPersonal->dni;
		$this->cuit = $infoPersonal->cuit;
		$this->razon_social = $infoPersonal->razon_social;
	}
	
	public function editarInfoPersonal()
	{
		$datos = $this->validate();
	
		$infoPersonal = InfoPersonal::find($this->infoPersonal_id);
	
		$infoPersonal->nombre = $datos['nombre'];
		$infoPersonal->dni = $datos['dni'];
		$infoPersonal->cuit = $datos['cuit'];
		$infoPersonal->razon_social = $datos['razon_social'];
	
		$infoPersonal->save();

		return redirect()->route('info-trabajo.create', ['expedienteId' => $this->expediente_id]);
	}
    public function render()
    {
        return view('livewire.editar-info-personal');
    }
}
