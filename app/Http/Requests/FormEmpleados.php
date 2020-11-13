<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormEmpleados extends FormRequest
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
            'NombreEmpleado' => 'required',
            'ApellidoEmpleado' => 'required',
            'DUIE' => ['required', 'regex:/([0-9]){9}/'],
            'idEdadE' => 'required',
            'idtelefonoE' => ['required', 'regex:/([0-9]){8}/'],
            'idcorreoE' => ['required', 'regex:/[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+/'],           
        ];
    }

    public function messages()
    {
        return [
            'NombreEmpleado.required' => 'El Nombre es obligatorio',
            'ApellidoEmpleado.required' => 'El Nombre es obligatorio',
            'DUIE.required' => 'El campo DUI no es opcional',
            'DUIE.regex' => 'El campo DUI debe tener el siguiente formato 00000000-0',
            'idEdadE.required' => 'El campo edad no es opcional',
            'idtelefonoE.required' => 'El campo telefono no es obligatorio',
            'idtelefonoE.regex' => 'El campo télefono debe tener el siguiente formato 0000-0000',
            'idcorreoE.required' => 'El correo es indispensable ',
            'idcorreoE.regex' => 'El campo correo debe tener el siguiente formato ejemplo@gmail.com',
        ];
    }
}
