<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periodo_turno extends Model
{
	protected $table = 'periodo_turno';

	protected $fillable = ['periodo', 'ano'];

	public function turno()
	{

		return $this->hasMany('\App\turno');
		//return $this->belongsTo('App\turno');
	}
}
