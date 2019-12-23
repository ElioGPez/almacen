<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
	protected $table = "liquidacion_conceptos";
    protected $primaryKey ="id";

    protected $filable = ['monto','liquidacion_id','concepto_id'];

    public function liquidacion()
    {
        return $this->belongsTo('App\Liquidacion');
    }
    public function concepto()
    {
        return $this->hasOne('App\Concepto');
    }
}