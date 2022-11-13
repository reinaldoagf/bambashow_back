<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Provider;
use App\Models\OrderSupplier;
use PDF;
use File;

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
    public function orders(){
        try {
            $response = [
                'message'=> 'Lista de pedidos a proveedores',
                'data' => OrderSupplier::all(),
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
    public function createOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:45',
            'id_provider'=> 'required',
        ],[
            'message.required'            => 'El nombre es requerido',
            'message.max'                 => 'El nombre debe contener como máximo 45 caracteres',
            'id_provider.required'        => 'El proveedor es requerido',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $element= OrderSupplier::create($request->all());
            $path = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? public_path().'\pdf' : public_path().'/pdf';
            if(!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $date=date("Y-m-d").'_'.date("H:i:s");
            $filename=strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? $path.'\order'.rand(0,50).'.pdf' : $path.'/order_'.$date.'.pdf';
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('pdfs.test',['order'=>$element])
            ->save($filename)
            ->stream('download.pdf'); /**/
    
            // Mail::to($provider->email)->send(new SupplieInventoryComparative($filename));

            $response = [
                'message'=> 'Pedido creado satisfactoriamente',
                'data' => $element,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }


        
    }
	public function  pdf()
	{
		try {
            $order = OrderSupplier::inRandomOrder()->first();
            // return view('pdfs.test');
            return view('pdfs.order-supplier',compact('order'));
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
}
