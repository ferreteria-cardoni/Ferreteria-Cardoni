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
<<<<<<< HEAD
            'idcodventa' => 'required',
            'nombreventa' => 'required',
            'iddireccion'=> 'required',
            'nombreproducto'=> 'required',
           // 'idcantidad'=> 'required',

            
            
=======
            // 'idcodventa' => 'required',
            'nombreventa' => 'required',       
            'nombreproducto'=> 'required',
            'iddireccion'=> 'required',
            'idcantidad'=> 'required',    
>>>>>>> b4cc3f7401cefc177d602c3d209bf36254f4b3e5
        ];
    }

    public function messages()
    {
        return [
            // 'idcodventa.required' => 'El Codigo de pedido no puede estar vacio',
            'nombreventa.required' => 'Se debe seleccionar Un Cliente',
            'iddireccion.required' => 'El Campo Dirección es obligatorio',          
            'nombreproducto.required' => 'Sleccione uno o varios Productos',
            'idcantidad.required' => 'Defina una cantidad superior a 0',
            
        ];
    }
}
