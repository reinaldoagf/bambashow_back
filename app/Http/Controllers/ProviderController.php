<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function all(){
        try {
            $response = [
                'message'=> 'Lista de Proveedores',
                'data' => Provider::all(),
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
            $element = Provider::find($id);
            if(is_null($element)){
                return response()->json([
                    'message'=>'Proveedor no existente',
                    'data'=>$element
                ],404);
            }
            $response = [
                'message'=> 'Proveedor encontrada',
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
    public function create(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:45',
            'email'=> 'required|string|email|max:100|unique:providers',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ],[
            'name.required'            => 'El nombre es requerido',
            'name.max'                 => 'El nombre debe contener como máximo 45 caracteres',
            'email.required'           => 'El correo es requerido',
            'email.unique'             => 'El correo fue registrado para otro proveedor',
            'phone_number.required'    => 'El número de télefono es requerido',
            'phone_number.regex'       => 'El número de télefono es incorrecto',
            'phone_number.min'         => 'El número de télefono debe tener un mínimo de 10 carácteres',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= Provider::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Proveedor no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Proveedor actualizado satisfactoriamente',
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
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:45',
            'email'=> 'required|string|email|max:100|unique:providers,email,'.$id,
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ],[
            'name.required'            => 'El nombre es requerido',
            'name.max'                 => 'El nombre debe contener como máximo 45 caracteres',
            'email.required'           => 'El correo es requerido',
            'email.unique'             => 'El correo fue registrado para otro proveedor',
            'phone_number.required'    => 'El número de télefono es requerido',
            'phone_number.regex'       => 'El número de télefono es incorrecto',
            'phone_number.min'         => 'El número de télefono debe tener un mínimo de 10 caracteres',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= Provider::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Proveedor no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Proveedor actualizado satisfactoriamente',
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
            $element = Provider::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'El Proveedor no existente'],404);
            }
            $response = [
                'message'=> 'Proveedor eliminado satisfactoriamente',
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
