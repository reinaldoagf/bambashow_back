<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function all(){
        try {
            $response = [
                'message'=> 'Lista de usuarios',
                'data' => User::all(),
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function get($id){
        try {
            $element = User::find($id);
            if(is_null($element)){
                return response()->json([
                    'message'=>'Usuario no existente',
                    'data'=>$element
                ],404);
            }
            $response = [
                'message'=> 'Usuario encontrada',
                'data' => $element,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    } 
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:users,email,'.$id,
            'password' => 'string|min:8|confirmed',
            'id_rol' => 'required|integer',
        ],[
            'name.required'                  => 'El nombre es requerido',
            'name.max'                       => 'El nombre debe contener como máximo 45 caracteres',
            'email.unique'                   => 'Este email ya se encuentra en uso',
            'email.email'                    => 'El email debe de tener un formato ejemplo@ejemplo.com',
            'email.required'                 => 'El email es requerido',
            'password.min'                   => 'La contraseña debe de tener minimo 8 caracteres',
            'password.confirmed'             => 'Las contraseña no coinciden vuelva a intentar',
            'id_rol.required'                => 'El rol es requerido',
            'id_rol.integer'                 => 'El rol debe ser un número entero',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= User::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Usuario no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Usuario actualizado satisfactoriamente',
                'data' => $element,
            ];
            $element->update();
            return response()->json($response, 200);          
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function delete($id){
        try {
            $element = User::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'El usuario no existente'],404);
            }
            $response = [
                'message'=> 'Usuario eliminado satisfactoriamente',
                'data' => $element,
            ];
            $element->delete();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
}
