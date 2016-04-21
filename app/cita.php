<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
	protected $table = 'cita';

	protected $fillable = ['id_periodo', 'cedula_paciente', 'cedula_medico', 'fecha', 'hora', 'estado'];

	public function periodo_cita()
	{
		return $this->belongsTo('App\periodo_cita');
	}

	public function historia()
	{
		return $this->hasMany('\App\historia');
	}

	public function atencion()
	{
		return $this->belongsTo('App\cita');
	}

	public function cita()
	{
		return $this->belongsTo('App\cita');
	}
}
