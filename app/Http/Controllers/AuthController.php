<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'       => 'required',
            'password'       => 'required',
        ],[
            'email.required'  => 'El email es requerido',
            'password.required'  => 'La contraseña es requerida',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }      
        $credentials = $request->only('email', 'password');
        try {
            $exp= Carbon::now()->addDays(30)->timestamp;
            $token= JWTAuth::attempt($credentials, ['exp' => $exp]);
			if (!$token || is_null($token)) {
				return response()->json(['error' => 'Usuario o contraseña Incorrectos'], 400);
			}
            return response()->json([
                "message"=> "Usuario logueado",
                "data"=> [
                    "token"=>$token,
                    "user"=>JWTAuth::user(),
                    "exp"=>$exp
                ]
            ],200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    }

    public function signup(Request $request){
        $validator = Validator::make($request->all(), [
            "name"=>"required",
            "email"=>"required|string|email|max:100|unique:users",
            "password"=>"required|string|min:6",
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        } 
        $credentials = $request->only('email', 'password');
        try {
            $user = User::create(array_merge($validator->validate(),["password"=>bcrypt($request->password)]));
            $exp= Carbon::now()->addDays(30)->timestamp;
            $token= JWTAuth::attempt($credentials, ['exp' => $exp]);
			if (!$token || is_null($token)) {
				return response()->json(['error' => 'Usuario o contraseña Incorrectos'], 400);
			}
            return response()->json([
                "message"=> "Usuario registrado",
                "data"=> [
                    "token"=>$token,
                    "user"=>JWTAuth::user(),
                    "exp"=>$exp
                ]
            ],200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    }
}
