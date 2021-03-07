<?php 
function cuantos(){
	$contar=0;
	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
        $contar=count($venta->carrito);

        return $contar;
}

