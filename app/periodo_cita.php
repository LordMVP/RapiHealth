<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periodo_cita extends Model
{
	protected $table = 'periodo_cita';

	protected $fillable = ['periodo', 'ano', 'fechas'];

	public function cita()
	{
		return $this->hasMany('\App\cita');
	}
}
