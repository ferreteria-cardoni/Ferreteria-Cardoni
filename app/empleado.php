<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{

	protected $primaryKey = 'cod_empleado';
    
    public function user()
    {
        return $this->hasOne(User::class,'cod_empleado_fk');
    }

     public function compra()
    {
        return $this->hasMany(compra::class,'cod_empleado_fk');
    }

    public function venta()
    {
        return $this->hasMany(venta::class,'cod_empleado_fk');
    }


}
