<?php

namespace App\Livewire;

use App\Models\Honorario;
use Livewire\Component;

class CrearHonorario extends Component
{
    public $expediente_id;
    public $honorarios = [];
    public $valor;
	public $trabajo;
	public $superficie;
	public $superficie_cubierta;
    public $unidades;
	public $plantas;
	public $nro_lote;
	public $P;
	public $L;
	public $pasoActual=3;
	public $expedienteId;
    public $aporteComitente = 0;
    public $totalAportes = 0;
    public $totalHonorarios = 0;

    protected $rules = [
        'expediente_id' => 'required',
		'trabajo' => 'required',
		'superficie' => 'required|numeric',
        'superficie_cubierta' => 'required|numeric',
		'unidades' => 'required|numeric',
		'plantas' => 'required|numeric',
		'nro_lote' => 'required|numeric',
		'P' => 'required',
		'L' => 'required',
		'valor' => 'required|numeric',
    ];

	public function crearHonorario()
	{
		$datos = $this->validate();
	
		Honorario::create([
			'expediente_id' => $this->expediente_id,
			'superficie' => $this->superficie,
			'trabajo' => $this->trabajo,
			'superficie_cubierta' => $this->superficie_cubierta,
			'unidades' => $this->unidades,
			'plantas' => $this->plantas,
			'nro_lote' => $this->nro_lote,
			'P' => $this->P,
			'L' => $this->L,
			'valor' => $this->valor,
		]);
	
		$this->totalAportes += $datos['valor'] * 0.18;
		$this->totalHonorarios += $datos['valor'];
	
		$this->reset(['superficie', 'trabajo' ,'superficie_cubierta', 'unidades', 'plantas', 'nro_lote', 'P', 'L','valor']);

		$this->honorarios = Honorario::where('expediente_id', $this->expediente_id)->get()->toArray();
	}

    public function render()
    {
        return view('livewire.crear-honorario');
    }
}