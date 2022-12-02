<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSection;
use App\Models\HomeSectionListItem;
use Image;
use File;

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
    public function sectionsGet($id){
        try {
            $element = HomeSection::find($id);
            if(is_null($element)){
                return response()->json([
                    'message'=>'Sección no existente',
                    'data'=>$element
                ],404);
            }
            $response = [
                'message'=> 'Sección encontrada',
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
    public function sectionsUpdate(Request $request,$id){
        try {
            $element= HomeSection::find($id);
            if(is_null($element)){
                return response()->json(['message'=>'Sección no existente'],404);
            }
            $element->fill([
                'theme'=>$request->get('theme'),
                'icon_side'=>$request->get('icon_side'),
                'icon_side_theme'=>$request->get('icon_side_theme'),
                'title_side'=>$request->get('title_side'),
                'description_side'=>$request->get('description_side'),
                // 'image_side'=>$request->get('image_side'),
                'title'=>$request->get('title'),
                'description'=>$request->get('description'),
                'active'=>$request->get('active'),
                'separator_bottom'=>$request->get('separator_bottom'),
            ]);
            //photo
            /* if ($request->image_side || $request->hasFile('image_side')){                
                $path = public_path().'/images';
                if(!File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $image = $request->file('image_side');
                if(!is_null($image)){
                    $filename = '/images/'.time() . '-main-face.jpg';
                    $element->image_side = $filename?asset($filename):'https://www.tibs.org.tw/images/default.jpg';
                    Image::make($image)->orientate()->save(public_path($filename));
                }
            } */
            foreach ($request->get("list_items") as $key => $value) {
                if($value["id"]){
                    $homeSectionListItem = HomeSectionListItem::findOrFail($value["id"]);
                    $homeSectionListItem->text=$value["text"];
                    $homeSectionListItem->theme=is_array($value["theme"])?$value["theme"][0]:$value["theme"];
                    $homeSectionListItem->update();
                }else{
                    $homeSectionListItem = new HomeSectionListItem();
                    $homeSectionListItem->text=$value["text"];
                    $homeSectionListItem->icon="ni ni-satisfied";
                    $homeSectionListItem->theme=is_array($value["theme"])?$value["theme"][0]:$value["theme"];
                    $homeSectionListItem->id_home_section=$element->id;
                    $homeSectionListItem->save();
                }
            }
            $element->update();
            $response = [
                'message'=> 'Sección actualizado satisfactoriamente',
                'data' => $element,
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
}
