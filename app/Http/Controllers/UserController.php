<?php

namespace App\Http\Controllers;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;

class UserController extends Controller
{
    public function user(Request $request){

    	try {
    		
    		$user = JWTAuth::parsetoken()->authenticate();

    	} catch (Exception $e) {
    		if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
    			return response()->json(['error' => 'Token Salah!'], 400);
    		}else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
    			return response()->json(['error' => 'Token Expired!'], 400);
    		}else{
    			return response()->json(['error' => 'Harap Masukan Token!'], 401);
    		}
    	}

    	return new UserResource($user);
    }
}
