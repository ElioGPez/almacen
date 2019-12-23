<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = "clientes";
    protected $primaryKey ="id";

    protected $filable = ['nombre','apellido','dni','telefono','email','estado','domicilio_id'];
    
    public function domicilio()
    {
        return $this->hasOne('App\Domicilio');
    }
    public function cuenta()
    {
        return $this->hasOne('App\Cuenta');
    }
}
