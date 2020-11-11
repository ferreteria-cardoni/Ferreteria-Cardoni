<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProveedores extends FormRequest
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
            'idnombreProve' => 'required',
            'idtelefonoProve' => ['required', 'regex:/([0-9]){8}/'],
            'idcorreoProve' => ['required', 'regex:/[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+/'],           
        ];
    }

    public function messages()
    {
        return [
            'idnombreProve.required' => 'El Nombre del Proveedor es obligatorio',
            'idtelefonoProve.required' => 'El campo télefono no es opcional',
            'idtelefonoProve.regex' => 'El campo télefono debe tener el siguiente formato 0000-0000',
            'idcorreoProve.required' => 'El correo de el proveedor es indispensable ',
            'idcorreoProve.regex' => 'El campo correp debe tener el siguiente formato ejemplo@gmail.com',
        ];
    }
}
