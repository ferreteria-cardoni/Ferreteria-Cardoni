<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'cod_cliente';

    public function venta()
    {
    	return $this->hasMany(venta::class,'cod_cliente_fk');
    }
}
