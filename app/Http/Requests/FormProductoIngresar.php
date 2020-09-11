<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductoIngresar extends FormRequest
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
            'idcantidad' => 'required|numeric',
            'idprecio' => 'required|numeric',
            'idproveedor' => 'required',
            'idproducto' => ['required', 'regex:/([A-Z]|[a-z]){3}([0-9]){3}/'],
            
        ];
    }

    public function messages()
    {
        return [
            'idnombre.required' => 'El Campo Nombre no puede estar vacio',
            'idmarca.required' => 'Se debe seleccionar almenos una opcione del Campo Marca',
            'idpresentacion.required' => 'El Campo Presentacion no puede estar vacio',
            'idcantidad.required' => 'El Campo Cantidad debe tener almenos un valor de 0',
            'idprecio.required' => 'El Campo Precio no puede tener un valor inferior a 0.01',
            'idproveedor.required' => 'Se debe seleccionar almenos una opcione del Campo Proveedor',
            'idproducto.required' => 'Consulte el catalogo por el codigo del producto',
            'idproducto.regex' => 'Consulte el catalogo, el formato del codigo es incorrecto (aaa111)',
            
        ];
    }
}
