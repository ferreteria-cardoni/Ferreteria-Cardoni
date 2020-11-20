<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormClientes extends FormRequest
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
            'idnombreC' => 'required',
            'idapellidoC' => 'required',
            'idtelefonoC' => ['required', 'regex:/([0-9]){8}/'],      
            'idrubro' => 'required',
            'NIT' => ['required', 'regex:/([0-9]){14}/'],
            'NCF' => ['required', 'regex:/([0-9]){11}/'],
            'DireccionC' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'idnombreC.required' => 'El Campo Nombre no puede estar vacio',
            'idapellidoC.required' => 'El Campo apellido no puede estar vacio',
            'idtelefonoC.required' => 'El campo telefono es requerido',
            'idtelefonoC.regex' => 'El formato del campo telefono es 9999-9999 (8 digitos)',
            'NIT.required' => 'El campo NIT es requerido',
            'NIT.regex' => 'El formato del campo NIT es 9999-999999-999-9 (14 digitos)',
            'NCF.required' => 'El campo numero de consumidor final es requerido',
            'NCF.regex' => 'El formato del campo numero de consumidor final es 99999999999 (11 digitos)',
            'DireccionC.required' => 'El Campo direccion no puede estar vacio',
            'idrubro.required' => 'El Campo rubro es obligatorio',
        ];
    }
}
