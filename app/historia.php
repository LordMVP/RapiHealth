<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historia extends Model
{
	protected $table = 'historia';

	protected $fillable = ['cedula_paciente', 'id_cita', 'fecha', 'observacion'];


	public function periodo_cita()
	{
		return $this->belongsTo('App\cita');
	}

}
