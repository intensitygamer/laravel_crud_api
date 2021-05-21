<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request){   
 
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

        
    }
    
    public function admin_login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type_id' => 2])) { 
        
          $user = Auth::user();
         
          $email = $user->email;
          $user_type_id = $user->user_type_id;
        
          return response()->json([
            'status'   => 'success',
            'user' => $email,
            'user_type_id' => $user_type_id,
          ]); 

        } else { 
          return response()->json([
            'status' => 'error',
            'user'   => 'Unauthorized Access'
          ]); 
        } 
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
    
}
