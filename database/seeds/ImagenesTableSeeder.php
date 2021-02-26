<?php

use Illuminate\Database\Seeder;

class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('imagenes')->insert([
        	['nombre' => '1', 'url' => 'img_productos/1.PNG'],
        	['nombre' => '2', 'url' => 'img_productos/2.PNG'],
        	['nombre' => '3', 'url' => 'img_productos/3.PNG'],
        	['nombre' => '4', 'url' => 'img_productos/4.PNG'],
        	['nombre' => '5', 'url' => 'img_productos/5.PNG'],
        	['nombre' => '6', 'url' => 'img_productos/6.PNG'],
        	['nombre' => '7', 'url' => 'img_productos/7.PNG'],
        	['nombre' => '8', 'url' => 'img_productos/8.PNG'],
        	['nombre' => '9', 'url' => 'img_productos/9.PNG'],
        	['nombre' => '10', 'url' => 'img_productos/10.PNG'],
        	['nombre' => '11', 'url' => 'img_productos/11.PNG'],
        	['nombre' => '12', 'url' => 'img_productos/12.PNG'],
        	['nombre' => '13', 'url' => 'img_productos/13.PNG'],
        	['nombre' => '14', 'url' => 'img_productos/14.PNG']

        ]);

        \DB::table('productos_has_imagenes')->insert([
        	['id_producto' => 1,'id_imagen' => 1],
        	['id_producto' => 2,'id_imagen' => 2],
            ['id_producto' => 3,'id_imagen' => 3],
        	['id_producto' => 4,'id_imagen' => 4],
        	['id_producto' => 5,'id_imagen' => 5],
        	['id_producto' => 6,'id_imagen' => 6],
        	['id_producto' => 7,'id_imagen' => 7],
        	['id_producto' => 8,'id_imagen' => 8],
        	['id_producto' => 9,'id_imagen' => 9],
        	['id_producto' => 10,'id_imagen' => 10],
        	['id_producto' => 11,'id_imagen' => 11],
        	['id_producto' => 12,'id_imagen' => 12],
        	['id_producto' => 13,'id_imagen' => 13],
        	['id_producto' => 14,'id_imagen' => 14]
        ]);
    }
}
