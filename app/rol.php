<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{

	protected $primaryKey = 'cod_rol';

    public function empleado()
    {
    	return $this->hasMany(empleado::class,'cod_rol_fk');
    }
}
