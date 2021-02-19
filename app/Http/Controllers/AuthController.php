<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
	public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

	public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');

        if(!$token = auth()->attempt($credentials)){
        	return response()->json(['error' => 'Email atau Password Salah!'], 401);
        };

        return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 240
                ]], 200);
    }

     public function register(RegisterRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
           	'nohp' => $request->nohp,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        $token = auth()->attempt($credentials);

        return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'token' => $token,
                ]], 201);
    }

    public function me(){
        return response()->json(auth()->user());
    }

    public function logout(){
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(){
        return $this->respondWithToken(auth()->refresh());
    }

}
