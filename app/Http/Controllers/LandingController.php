<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingSection;

class LandingController extends Controller
{
    public function sections(){
        try {
            $response = [
                'message'=> 'Secciones',
                'data' => LandingSection::all(),
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
}
