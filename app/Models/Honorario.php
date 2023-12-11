<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorario extends Model
{
    use HasFactory;

	protected $fillable = ['expediente_id', 'articulo', 'precio'];
	
	public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function infoTrabajo()
    {
        return $this->belongsTo(InfoTrabajo::class);
    }
}
