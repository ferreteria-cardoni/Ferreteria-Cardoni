<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCrearCompras extends FormRequest
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
            'nombreproducto' => 'required',
            'idproveedor' => 'required',         
            'idcantidad' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombreproducto.required' => 'El Campo Nombre Producto no puede estar vacio',
            'idproveedor.required' => 'Se debe seleccionar al menos una opcion del Campo Proveedor',
            'idcantidad.required' => 'El campo cantidad no puede estar vacío',
        ];
    }
}
