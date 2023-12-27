<?php

namespace App\Models;

use App\Models\Expediente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfoTrabajo extends Model
{
    use HasFactory;

	protected $fillable = [
        'nomenclatura',
        'nro_cuenta',
		'tipo_parcela',
		'expediente_id'
    ];

	public function expediente(){
		return $this->belongsTo(Expediente::class);
	}
}
