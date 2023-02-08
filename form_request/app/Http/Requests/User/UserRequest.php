<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /** 1 
     * redireccionar cuando arroja error */
    // protected $redirectRoute = 'home';
    // protected $redirect = '/home';

    /** 2
     * corta en primera falla
     * debe dejar de validar todos los atributos una vez que ocurra una sola falla de validación
     */
    protected $stopOnFirstFailure = true;



    /**
     * 3
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
        /** 4
         * Verificamos que tipo de accion es para crear una regla sobre las pass:
         * Tambien podemos verificar por el metodo de la request
         * if request()->isMethod('post) OR isMethod('put)/patch
        */

        if( request()->routeIs('users.store')){
            $passwordRule = 'required';
        }elseif( request()->routeIs('users.update')){
            $passwordRule = 'sometimes';
        }
        /** la regla `sometimes` dice que si viene en la request es required, sino, no es necesario validarlo */


        /** 5
         * Podemos acceder a toda la info de la request/form con `$this` */

        return [
            'name'      => 'string|required|min:3',
            'email'     => 'unique:users|required',

            /**6 
             * otra forma donde permitimos actualizar toda la info sin necesidad de editar el email o pass por ejemplo
             * se puede hacer con todo el usuario o con el id
             * lo que si, la docu de laravel dice que no utilicemos la funcion request() para ignorar campos por 
             * posibles ataques (sql injection) */
            // 'email'     => ['required, Rule::unique('users)->ignore($this->user)],

            'password'  => [$passwordRule, Password::defaults()],

            /**7 
             * desde la version 8 de laravel podemos hacer 
             * password => [
             *       Rule::when(request->isMethod('POST'), 'required),
             *       Rule::when(request->isMethod('PUT'), 'optional),
             *      'confirmed,
             *       Password::defaults()
             * ]
            */
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
            // 'password.string'   => 'La pass tiene que ser una cadena de texto'
        ];
    }

    /** 
     * Modificamos la clave :atributo de su mensaje de validación 
     * se reemplace con un nombre de atributo personalizado
     */
    public function attributes()
    {
        return [
            'email'     => 'email address',
            'nombre'    => 'name attribute',
            'password'  => 'pass'
        ];
    }

    /**
     * Si no viene el campo password, lo removemos de la request porque no se permite enviar password = null
     * Se ejecuta antes de leer las validaciones
     * @return void
     */
    public function prepareForValidation()
    {
        if(!$this->password){
            $this->request->remove('password');
        }
    }
}
