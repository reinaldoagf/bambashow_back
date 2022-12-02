<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeController extends Controller
{
    public function sections(){
        try {
            $response = [
                'message'=> 'Secciones',
                'data' => HomeSection::all(),
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
    
    public function sectionsUpdate(Request $request,$id){
        try {
            $element= HomeSection::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Sección no existente'],404);
            }
            $element->fill([
                'key'=>$request->get('key'),
                'theme'=>$request->get('theme'),
                'icon_side'=>$request->get('icon_side'),
                'icon_side_theme'=>$request->get('icon_side_theme'),
                'title_side'=>$request->get('title_side'),
                'description_side'=>$request->get('description_side'),
                'image_side'=>$request->get('image_side'),
                'title'=>$request->get('title'),
                'description'=>$request->get('description'),
                'active'=>$request->get('active'),
                'separator_bottom'=>$request->get('separator_bottom'),
            ]);
            $response = [
                'message'=> 'Sección actualizado satisfactoriamente',
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
}
