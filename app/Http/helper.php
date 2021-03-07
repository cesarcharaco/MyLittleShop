<?php 
function cuantos(){
	$contar=0;
	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
	if($venta!=null){
        $contar=count($venta->carrito);
	}

        return $contar;
}

function carrito(){

	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();

	//dd($venta->productos);
	$i=1;
	if($venta!=null){
	foreach($venta->carrito as $key){
		$producto=App\Productos::find($key->id_producto);
		
      echo "<tr>
        <td>".$i."</td>
        <td>".$producto->nombre."</td>
        <td>".$key->cantidad."</td>
        <td>".$producto->precio_und."</td>
        <td align='center'><a href='#' role='button' aria-expanded='false' aria-controls='QuitarProducto' class='btn btn-danger btn-sm' onclick='QuitarProducto(".$key->id_producto.",".$venta->id.")' data-toggle='tooltip' data-placement='top' title='Seleccione para quitar la producto del carrito'><i class='fa fa-trash'></i></a></td>
      </tr>";
      $i++;
    }
	}
}
function total(){

	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
	$total=0;
	if($venta!=null){
	foreach($venta->carrito as $key){
		$producto=App\Productos::find($key->id_producto);
		$total+=$producto->precio_und*$key->cantidad;
    }
	}
    return $total;
}

function venta_actual(){
	
	$venta=App\Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
 	if($venta!=null){
    return $venta->id;
	}else{

		return 0;
	}
}