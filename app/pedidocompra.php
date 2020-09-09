<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedidocompra extends Model
{
    protected $primaryKey = 'cod_pedidocompra';

    public function compra()
    {
    	return $this->belongsTo(compra::class,'cod_compra_fk');
    }

     public function producto()
    {
    	return $this->belongsTo(producto::class,'cod_producto_fk');
    }


}
