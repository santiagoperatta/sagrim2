<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTrabajo extends Model
{
    use HasFactory;

	protected $fillable = [
        'nomenclatura',
        'nro_cuenta',
        'datos',
		'tipo_parcela',
		'tasa_colegio',
		'expediente_id'
    ];

	public function expediente(){
		return $this->belongsTo(Expediente::class);
	}
}
