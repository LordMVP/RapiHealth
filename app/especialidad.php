<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
	protected $table = 'especialidad';

	protected $fillable = ['nombre'];

	public function user()
	{
		return $this->belongsToMany('\App\User')->withPivot('created_at', 'updated_at');
	}
}
