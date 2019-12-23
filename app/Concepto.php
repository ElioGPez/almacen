<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
	protected $table = "conceptos";
    protected $primaryKey ="id";

    protected $filable = ['codigo','concepto','porcentaje','tipo'];
    
    public function liquidacion_concepto()
    {
        return $this->belongsTo('App\LiquidacionConcepto');
    }
}
