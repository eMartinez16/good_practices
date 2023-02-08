<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([User::find('all')], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Exception
     */
    public function store(UserRequest $request)
    {
        /** Mala practica: 
         *  Perdes lo principal de los principios SOLID y DRY (Single responsabilty principle, dont repeat yourself)
         * en el caso de que uses dos metodos para hacer lo mismo, repetirias la misma validacion varias veces.
         * Otra es que le estamos poniendo mucha logica al controller y estamos tratando de alejarnos de eso
         * `Cada clase o funcion tiene que encargarse de una sola cosa`
         */

        // $validated = $request->validate([
        //     'name' => 'required|string' ...
        // ])


        /** Esto tampoco es lo ideal, lo deseado puede llegar a ser:
         * controller -> service -> formrequest y toda la logica
        */


        if($request->fails()){
            return 
                redirect('/users')
                ->withErrors($request);
        }

        /** podemso negar esto para manejar errores tmb: !$request->validated() */
        if($request->validated()){
            if(!User::create($request)){
                throw new \Exception('Error creating user');
            }


            return response()->json(['msg' => 'User created successfully'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(['user' => User::findOrFail($id)], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        /** we can create PostRequest and UpdateRequest 
         * because when u are updating a field, u dont need some fields, 
         * or u can specify the type of each field
          */

        /** !DRY */
        if($request->fails()){
            return 
                redirect('/users')
                ->withErrors($request);
        }


        if($request->validated()){
            if(!User::create($request)){
                throw new \Exception('Error updating user');
            }


            return response()->json(['msg' => 'User created successfully'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
