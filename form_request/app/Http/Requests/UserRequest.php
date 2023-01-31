<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /** redireccionar cuando arroja error */
    // protected $redirectRoute = 'home';
    // protected $redirect = '/home';

    /**
     * corta en primera falla
     */
    protected $stopOnFirstFailure = true;






    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'string|required|min:3',
            'email'     => 'unique:users|required',
            'password'  => 'string',
        ];
    }

    public function messages()
    {
        return [
            'nombre.string'     => 'El nombre tiene que ser una cadena de texto',
            'nombre.required'   => 'El nombre es requerido',
            'nombre.min'        => 'El nombre no cumple con el minimo de caracteres(3)',
            'email.required'    => 'El email es requerido',
            'email.unique'      => 'El email tiene que ser unico en el sistema',
            'password.string'   => 'La contrasenia tiene que ser una cadena de texto'
        ];
    }

    public function attributes()
{
    return [
        'email'     => 'email address',
        'nombre'    => 'name',
        'password'  => 'pass'
    ];
}
}
