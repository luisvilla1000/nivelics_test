<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:api',['except' => ['login']]);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function login(){
        $credentials = request(['username', 'password']);

        if(!$token = auth()->attempt($credentials)){
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        "Password incorret for: " . $credentials['username'],
                    ],
                ]
            ], 401);
        }

        return response()->json([
            "meta" => [
                "success" => true,
                "errors" => [],
            ],
            "data" => $this->respondWithToken($token),
        ]);
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'message' => "Sesión cerrada correctamente"
        ]);
    }

    public function respondWithToken($token){
        return response()->json([
            'token'  =>  $token,
            'seconds_to_expire' =>  auth()->factory()->getTTL() * 1440
        ]);
    }


    public function testLogin(){
        try {
            $user = User::find(Auth::user()->_id);
        return response()->json([
            'user' => $user,
            'status' => true
        ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        'Token Expired'
                    ]
                ]
            ],401);
        }
        
    }
}
