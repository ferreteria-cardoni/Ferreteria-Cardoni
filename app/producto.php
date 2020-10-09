<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $primaryKey = 'cod_producto';

    public $incrementing = false;
    
    public function proveedores()
    {
    	return $this->belongsTo(proveedor::class,'cod_proveedor_fk');
    }

    public function pedidocompra()
    {
    	return $this->hasMany(pedidocompra::class,'cod_producto_fk');
    }

     public function pedidoventa()
    {
    	return $this->hasMany(pedidoventa::class,'cod_producto_fk');
    }

     

      public function marcas()
    {
    	return $this->belongsToMany(marca::class,'marca_productos','cod_producto_fk','cod_marca_fk');
    }


    
}
