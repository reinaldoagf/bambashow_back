<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function all(){
        try {
            $response = [
                'message'=> 'Lista de productos',
                'data' => Product::all(),
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
            $element = Product::find($id);
            if(is_null($element)){
                return response()->json([
                    'message'=>'Producto no existente',
                    'data'=>$element
                ],404);
            }
            $response = [
                'message'=> 'Producto encontrada',
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
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:45',
        ],[
            'name.required'            => 'El nombre es requerido',
            'name.max'                 => 'El nombre debe contener como máximo 45 caracteres',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= Product::create($request->all());
            $response = [
                'message'=> 'Producto creada satisfactoriamente',
                'data' => Product::findOrFail($element->id),
            ];
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
        ],[
            'name.required'            => 'El nombre es requerido',
            'name.max'                 => 'El nombre debe contener como máximo 45 caracteres',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= Product::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Producto no existente'],404);
            }
            $element->fill($request->all());
            $response = [
                'message'=> 'Producto actualizado satisfactoriamente',
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
            $element = Product::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'El Producto no existente'],404);
            }
            $response = [
                'message'=> 'Producto eliminada satisfactoriamente',
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
