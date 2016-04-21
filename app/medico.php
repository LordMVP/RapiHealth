<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
	protected $table = 'medico_especialidad';

	protected $fillable = ['cedula_medico', 'id_especialidad'];

	public function especialidad()
	{
		return $this->belongsToMany('\App\especialidad');
	}
}
