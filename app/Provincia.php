<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
	protected $table = "provincias";
    protected $primaryKey ="id";

    protected $filable = [
    'nombre','pais_id'];


    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
    public function localidad()
    {
        return $this->hasMany('App\Localidad');
    }
}
