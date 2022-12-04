<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsContentSocialNetworks;

class SettingsController extends Controller
{
    public function socialNetworks(){
        try {
            $response = [
                "message"=> "Configuración de contenido",
                "data" => SettingsContentSocialNetworks::all(),
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
