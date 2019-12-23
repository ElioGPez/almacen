<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
	protected $table = "liquidaciones";
    protected $primaryKey ="id";

    protected $filable = ['sueldo_neto','periodo','total_haber','total_deduccion',
    'tipo','totalHaberRemunerativo','totalHaberNoRemunerativo','estado','empleado_id'];

    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
    public function liquidacion_concepto()
    {
        return $this->hasMany('App\LiquidacionConcepto');
    }
}
