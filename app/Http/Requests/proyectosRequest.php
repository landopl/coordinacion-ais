<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proyectosRequest extends FormRequest
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
            'titulo'                 => 'min:4|required|unique:proyectos',
            'resumen'                => 'min:4|required',
            'objetivos'              => 'min:4|required',
            'justificacion'          => 'min:4|required',
            'linea_investigacion_id' => 'required'
        ];
    }
}
