<?php

namespace App\Models;

use App\Models\User;
use App\Models\Trabajo;
use App\Models\Honorario;
use App\Models\InfoTrabajo;
use App\Models\Observacion;
use App\Models\InfoPersonal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediente extends Model
{
    use HasFactory;

	protected $fillable = [
		'estado',
		'enviado',
		'user_id',
		'tiene_observacion',
		'controlprevio',
		'nro_expediente',
		'admin_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function expediente()
	{
		return $this->belongsTo(Expediente::class, 'expediente_id');
	}
	
    public function infoPersonal()
    {
        return $this->hasOne(InfoPersonal::class);
    }

    public function infoTrabajo()
    {
        return $this->hasOne(InfoTrabajo::class);
    }

    public function honorarios()
    {
        return $this->hasMany(Honorario::class);
    }

	public function profesional()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

	public function observaciones()
    {
        return $this->hasMany(Observacion::class);
    }

	public function admin()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
