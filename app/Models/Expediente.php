<?php

namespace App\Models;

use App\Models\Honorario;
use App\Models\InfoTrabajo;
use App\Models\InfoPersonal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediente extends Model
{
    use HasFactory;

	protected $fillable = [
		'estado',
		'user_id'	
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
	
}
