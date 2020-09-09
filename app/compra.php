<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    
	protected $primaryKey = 'cod_compra';

    public function proveedor()
    {
    	return $this->belongsTo(proveedor::class,'cod_proveedor_fk');
    }

    public function empleado()
    {
    	return $this->belongsTo(empleado::class,'cod_empleado_fk');
    }

    public function pedidocompra()
    {
    	return $this->hasMany(pedidocompra::class,'cod_compra_fk');
    }

}
