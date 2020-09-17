<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscadorProducto extends FormRequest
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
            'buscador' => ['max:100','nullable', 'regex:/[\(a-z, A-Z, 0-9)+\s]$/']
        ];
    }

    public function messages()
    {
        return [
            'buscador.regex' => 'No se permiten caracteres especiales. Debe introducir el código del producto o el nombre.',
        ];
    }

}
