<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table='carritos';

    protected $fillable=['id_venta','id_producto','cantidad'];


    public function venta(){

    	return $this->belongsTo('App\Ventas','id_venta');
    }

    public function producto(){

    	return $this->belongsTo('App\Productos','id_producto');
    }
}
