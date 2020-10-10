<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'cod_cliente';
     protected $keyType = 'string'; //Esto sirvio para decirle a laravel que este campo sera string

    public function venta()
    {
    	return $this->hasMany(venta::class,'cod_cliente_fk');
    }
}
