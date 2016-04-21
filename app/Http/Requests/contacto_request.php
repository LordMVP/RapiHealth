<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class contacto_request extends Request
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
        'nombre' => 'min:2|max:120|required',
        'email' => 'min:15|max:320|required',
        'telefono' => 'min:5|max:15|required',
        'contenido' => 'required'
        ];
    }
}
