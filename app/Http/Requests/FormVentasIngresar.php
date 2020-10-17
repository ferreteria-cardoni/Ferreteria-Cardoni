<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormVentasIngresar extends FormRequest
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
            // 'idcodventa' => 'required',
            'nombreventa' => 'required',
            'iddireccion'=> 'required',
            'nombreproductoV'=> 'required',
            //'idcantidadV'=> 'required',

            
            
        ];
    }

    public function messages()
    {
        return [
            // 'idcodventa.required' => 'El Codigo de pedido no puede estar vacio',
            'nombreventa.required' => 'Se debe seleccionar Un Cliente',
            'iddireccion.required' => 'El Campo Dirección es obligatorio',          
            'nombreproductoV.required' => 'Sleccione uno o varios Productos',
            'idcantidadV.required' => 'Defina una cantidad superior a 0',
            
        ];
    }
}
