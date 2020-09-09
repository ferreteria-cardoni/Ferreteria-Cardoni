<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marca extends Model
{

	protected $primaryKey = 'cod_marca';

     public function producto()
    {
    	return $this->belongsToMany(producto::class,'marca_productos','cod_marca_fk','cod_producto_fk');
    }
}
