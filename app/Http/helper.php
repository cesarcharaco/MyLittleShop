<?php 
function cuantos(){
	$contar=0;
	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
        $contar=count($venta->carrito);

        return $contar;
}

function carrito(){

	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
	//dd($venta->productos);
	$i=1;

	foreach($venta->carrito as $key){
		$producto=App\Productos::find($key->id_producto);
		
      echo "<tr>
        <td>".$i."</td>
        <td>".$producto->nombre."</td>
        <td>".$key->cantidad."</td>
        <td>".$producto->precio_und."</td>
      </tr>";
      $i++;
    }
}
function total(){

	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
	$total=0;
	foreach($venta->carrito as $key){
		$producto=App\Productos::find($key->id_producto);
		$total+=$producto->precio_und*$key->cantidad;
    }

    return $total;
}