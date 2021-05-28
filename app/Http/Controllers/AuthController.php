<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Laravel\Socialite\Facades\Socialite;


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

        //$accessToken = auth()->user()->createToken('authToken')->accessToken;

       // return response(['user' => auth()->user(), 'access_token' => $accessToken]);

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
    

    public function handleProviderCallback(){

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }

        // check if they're an existing user

        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){

            // log them in

            auth()->login($existingUser, true);

        } else {

            // create a new user
            
            //print_r($user);

            $newUser                  = new User;
            $newUser->first_name      = $user->user['given_name'];
            $newUser->last_name       = $user->user['family_name'];
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->user_type_id    = 3;

            $newUser->avatar_url      = $user->avatar;
            //$newUser->avatar_original = $user->avatar_original;

            $newUser->save();
         
            auth()->login($newUser, true);
            
            return redirect()->to('/login');

        }
        
        return redirect()->to('/login');

    }

    public function redirectToProvider(){

        return Socialite::driver('google')->redirect();

    }


}
