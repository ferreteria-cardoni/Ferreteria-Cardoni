<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedidoventa extends Model
{
    protected $primaryKey = 'cod_pedidoventa';

    public function venta()
    {
    	return $this->belongsTo(venta::class,'cod_venta_fk');
    }

     public function producto()
    {
    	return $this->belongsTo(producto::class,'cod_producto_fk');
    }

}

