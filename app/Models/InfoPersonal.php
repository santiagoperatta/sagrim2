<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User;
use App\Models\Expediente;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class InfoPersonal extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'dni',
        'razon_social',
		'cuit',
		'expediente_id'
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

	public function user()
	{
		return $this->belongsTo(User::class, 'expediente_id', 'expediente_id');
	}

}
