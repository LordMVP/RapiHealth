<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turno extends Model
{
	protected $table = 'turno';

	protected $fillable = ['id_periodo', 'estado', 'ruta'];	

	public function periodo_turno()
	{
		return $this->belongsTo('App\periodo_turno');
		//return $this->hasOne('\App\periodo_turno');
	}
}
