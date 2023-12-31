<?php

namespace App\Models;

use App\Models\Expediente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Honorario extends Model
{
    use HasFactory;

	protected $fillable = ['expediente_id', 'unidades', 'plantas', 'nro_lote', 
	'superficie_cubierta', 'superficie', 'valor', 'P', 'L', ];
	
	public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
