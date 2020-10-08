<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductoModificar extends FormRequest
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
            'idnombre' => 'required',
            'idmarca' => 'required',
            'idpresentacion' => 'required',
            'idproveedor' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'idnombre.required' => 'El Campo Nombre no puede estar vacio',
            'idmarca.required' => 'Se debe seleccionar al menos una opcion del Campo Marca',
            'idpresentacion.required' => 'El Campo Presentacion no puede estar vacio',
            'idproveedor.required' => 'Se debe seleccionar al menos una opcion del Campo Proveedor',
        ];
    }
}
