<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert([
                    ['categoria' => 'Juguete'],
                    ['categoria' => 'Ropa Íntima'],
                    ['categoria' => 'Ropa'],
                    ['categoria' => 'Cuarto'],
                    ['categoria' => 'Oficina']]
        	);
        
    }
}
