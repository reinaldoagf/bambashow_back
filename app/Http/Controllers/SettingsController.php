<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsContentSocialNetworks;
use App\Models\SettingsContentAccountBank;

class SettingsController extends Controller
{
    public function socialNetworks(){
        try {
            $response = [
                "message"=> "Redes sociales",
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
    public function accountsBank(){
        try {
            $response = [
                "message"=> "Cuentas bancarias",
                "data" => SettingsContentAccountBank::all(),
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
