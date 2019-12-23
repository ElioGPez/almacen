<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = "categorias";
    protected $primaryKey ="id";

    protected $filable = ['categoria'];
    
    public function producto()
    {
        return $this->hasMany('App\Producto');
    }
}
