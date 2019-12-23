<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	protected $table = "empleados";
    protected $primaryKey ="id";

    protected $filable = ['turno','nombre','dni','apellido',
    'cuil','sexo','cargo','telefono','fecha_nacimiento','sueldo','fecha_ingreso','estado','domicilio_id'];

    public function venta()
    {
        return $this->hasMany('App\Venta');
    }
    public function domicilio()
    {
        return $this->hasOne('App\Domicilio');
    }
    public function liquidacion()
    {
        return $this->hasMany('App\Liquidacion');
    }
    public function usuario()
    {
        return $this->hasOne('App\User');
    }
}
