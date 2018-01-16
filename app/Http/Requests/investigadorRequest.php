<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class investigadorRequest extends FormRequest
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
            'nombre'   => 'string|min:4|max:100|required',
            'apellido' => 'string|min:4|max:100|required',
            'cedula'   => 'min:6|required|numeric|unique:investigadores',
            'correo'   => 'max:100|required|unique:investigadores|email',
            'telefono' => 'min:11|required|unique:investigadores|numeric',
            

        ];
    }
}
