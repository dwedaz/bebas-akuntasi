<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
   public function register(Request $request)
   {
      
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
       
   }


   public function login(Request $request)
   {
        $validator = Validator::make($request->all(), [
            'email'=>'email|required',
            'password'=>'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'data' => $validator->errors()
            ],422);    
        }
       
        $loginData = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
  
        if(!auth()->attempt($loginData)) {
            return response(['success' => false, 'message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken($request->device_name)->plainTextToken;

        return response(['success' => true, 'user' => auth()->user(), 'access_token' => $accessToken]);

   }
}

