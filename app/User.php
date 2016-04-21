<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = ['id', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'tipo', 'imagen', 'genero'];

    protected $hidden = ['password', 'remember_token'];

    public function especialidad()
    {
    	return $this->belongsToMany('\App\especialidad')->withTimestamps();
    }

    public function medico()
    {
        return $this->hasOne('\App\User');
    }

    public function paciente()
    {
        return $this->hasOne('\App\User');
    }
}
