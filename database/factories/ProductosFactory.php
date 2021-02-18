<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Productos;
use Faker\Generator as Faker;

$factory->define(Productos::class, function (Faker $faker) {
	$codigo=$faker->numberBetween(100,1000);
	$costo=$faker->randomFloat(2,1,20);
	$precio_und=$costo+2;
	$precio_mayor=number_format($precio_und*11,2);
	$existencia=$faker->numberBetween(1,20);
    return [
        'codigo' => $codigo,
		'nombre' => 'Produto'.$codigo,
		'id_categoria' => $faker->numberBetween(1,5),
		'costo' => $costo,
		'precio_und' => $precio_und,
		'precio_mayor' => $precio_mayor,
		'descripcion' => $faker->sentence(6,true),
		'existencia' => $existencia,
		'disponible' => $existencia,
		'con_detalles' =>  0,
		'vendidos' => 0
    ];
});
