<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\RawMaterial;

class RawMaterialController extends Controller
{
    public function all(){
        try {
            $response = [
                'message'=> 'Materia prima',
                'data' => RawMaterial::all(),
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
            $element = RawMaterial::find($id);
            if(is_null($element)){
                return response()->json([
                    'message'=>'Materia prima no existente',
                    'data'=>$element
                ],404);
            }
            $response = [
                'message'=> 'Materia prima encontrada',
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
            'quantity' => 'required|integer',
        ],[
            'name.required'               => 'El nombre es requerido',
            'name.max'                    => 'El nombre debe contener como máximo 45 caracteres',
            'quantity.required'           => 'La cantidad es requerida',
            'quantity.integer'            => 'La cantidad debe ser númerica',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= RawMaterial::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Materia prima no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Materia prima actualizado satisfactoriamente',
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
            'quantity' => 'required|integer',
        ],[
            'name.required'               => 'El nombre es requerido',
            'name.max'                    => 'El nombre debe contener como máximo 45 caracteres',
            'quantity.required'           => 'La cantidad es requerida',
            'quantity.integer'            => 'La cantidad debe ser númerica',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= RawMaterial::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Materia prima no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Materia prima actualizado satisfactoriamente',
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
            $element = RawMaterial::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'El Materia prima no existente'],404);
            }
            $response = [
                'message'=> 'Materia prima eliminado satisfactoriamente',
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
