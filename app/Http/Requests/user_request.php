<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class user_request extends Request
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
        'id' => 'min:8|max:30|required|unique:users',
        'nombre' => 'min:3|max:120|required',
        'email' => 'min:15|max:320|required|unique:users',
        'password' => 'min:4|max:25|required'
        ];
    }
}
