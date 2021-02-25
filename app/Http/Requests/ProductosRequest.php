<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => 'required',
            'nombre' => 'required',
            'costo' => 'required|numeric',
            'disponible' => 'required|numeric',
            'existencia' => 'required|numeric',
            'precio_und' => 'required|numeric'
        ];
    }

    public function mesagges(){
        return [
            'codigo.required' => 'El Código es obligatorio',
            'nombre.required' => 'El Nombre es obligatorio',
            'costo.required' => 'El Costo es obligatorio',
            'disponible.required' => 'La cantidad disponible es obligatoria',
            'existencia.required' => 'La cantidad de existencia es obligatoria',
            'precio_und.required' => 'El precio por unidad es obligatorio',
            'costo.numeric' => 'El Costo es numérico',
            'disponible.numeric' => 'La cantidad disponible es numérico',
            'existencia.numeric' => 'La cantidad de existencia es numérico',
            'precio_und.numeric' => 'El precio por unidad es numérico'
        ];   
    }
}
