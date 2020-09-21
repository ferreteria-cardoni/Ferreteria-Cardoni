<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'id';
    
    public function empleado()
    {
        return $this->belongsTo(empleado::class,'cod_empleado_fk');
    }

    public function roles()
    {
        return $this->belongsToMany(role::class)->withTimestamps();
    }

    public function asignarRol($role)
    {
        $this->roles()->sync($role, false); 
    }

    public function tieneRol()
    {
        return $this->roles->flatten()->pluck('nombre')->unique();
    }

    public function obtenerRol($rol)
    {
        return $this->roles()->where('nombre',$rol)->first();
    }




}
