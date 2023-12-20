<?php

namespace App\Livewire;

use App\Models\Honorario;
use Livewire\Component;

class CrearHonorario extends Component
{
    public $expediente_id;
    public $honorarios = [];
    public $articulo;
    public $precio;
	public $pasoActual=3;
	public $expedienteId;
    public $aporteComitente = 0;
    public $totalAportes = 0;
    public $totalHonorarios = 0;

    protected $rules = [
        'expediente_id' => 'required',
        'articulo' => 'required',
        'precio' => 'required|numeric',
    ];

	public function crearHonorario()
	{
		$datos = $this->validate();
	
		Honorario::create([
			'expediente_id' => $this->expediente_id,
			'articulo' => $this->articulo,
			'precio' => $this->precio,
		]);
	
		$this->aporteComitente += $datos['precio'] * 0.09;
		$this->totalAportes += $datos['precio'] * 0.18;
		$this->totalHonorarios += $datos['precio'];
	
		$this->reset(['articulo', 'precio']);

		$this->honorarios = Honorario::where('expediente_id', $this->expediente_id)->get()->toArray();
	}

    public function render()
    {
        return view('livewire.crear-honorario');
    }
}