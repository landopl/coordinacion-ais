<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lineaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // por defecto viene en false. se cambia a true para poder usar el request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // aqui es donde se definen las validaciones que va a tener los campos
    {
        return [
            'denominacion'           => 'min:4|max:100|required|unique:lineas_investigacion',
            'fecha_aprobacion_linea' => 'required|date' //|after:2000|before:date
        ];
    }
}
