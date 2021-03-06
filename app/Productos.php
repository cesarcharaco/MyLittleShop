<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';

    protected $fillable=['id','codigo','nombre','costo','precio_und','precio_mayor','descripcion','status','existencia','disponible','con_detalles','vendidos'];

    public function categorias(){

    	return $this->belongsTo('App\Categorias','id_categoria');
    }

    public function imagenes(){

    	return $this->belongsToMany('App\Imagenes','productos_has_imagenes','id_producto','id_imagen')->withPivot('mostrar');
    }

    public function ventas(){

        return $this->belongsToMany('App\Ventas','productos_has_ventas','id_producto','id_venta')->withPivot('cantidad');
    }

    public function carrito(){

        return $this->hasMany('App\Carrito','id_producto','id');
    }
}
