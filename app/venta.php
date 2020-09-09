<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $primaryKey = 'cod_venta';

    public function cliente()
    {
    	return $this->belongsTo(cliente::class,'cod_cliente_fk');
    }

    public function empleado()
    {
    	return $this->belongsTo(empleado::class,'cod_empleado_fk');
    }

    public function pedidoventa()
    {
    	return $this->hasMany(pedidoventa::class,'cod_venta_fk');
    }
}
