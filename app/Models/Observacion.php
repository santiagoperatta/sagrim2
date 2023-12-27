<?php

namespace App\Models;

use App\Models\User;
use App\Models\Expediente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Observacion extends Model
{
    use HasFactory;

	protected $fillable = ['expediente_id', 'user_id', 'comentario'];
	
	public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
