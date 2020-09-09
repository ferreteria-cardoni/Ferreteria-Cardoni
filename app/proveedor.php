<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{

	protected $primaryKey = 'cod_proveedor';
    
    public function producto()
    {
    	return $this->hasMany(producto::class,'cod_proveedor_fk');
    }


    public function compra()
    {
    	return $this->hasMany(compra::class,'cod_proveedor_fk');
    }
}
