<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;



use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AuthController extends Controller
{
    use LogsActivity;

    public function login(Request $request){
        
        $input   = $request->all();
        $user    = new User;
 
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            
 
            $user = User::where('email', $request->email)->first();

            // Client Log In

            if($user->user_type_id == 3 ){
    
                activity()->log('Client Log In');

                return redirect()->to('staffs');
            
            }
            
            // Staff Log In

            if($user->user_type_id == 4){

                activity()->log('Client Log In');

                return redirect()->to('staff_info');
            
            }

        }

        return redirect('/login')->with('message', 'This User does not exist, check your details');
        

    }
    
    public function admin_login(Request $request){

        $input   = $request->all();
        $user    = new User;
 
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
       

        if(Auth::attempt($credentials)) {
           
            $user = User::where('email', $request->email)->first();

            if($user->user_type_id == 2){

                return redirect()->to('clients');
            
            }

            if( $user->user_type_id == 1){

                return redirect()->to('admins');
            
            }

        }

        return redirect('admin_login')->with('message', 'This User does not exist, check your details');

    }

    public function logout (Request $request) {

        // $token = $request->user()->token();
        // $token->revoke();
        //
        //

        Auth::logout();
        
        //activity()->log('Logged In')->performedOn('App\Models\User');

        // $response = ['message' => 'You have been successfully logged out!'];

        // return response($response, 200);

        return redirect()->to('login')->with('error', 'You have been successfully logged out!');;

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

            auth()->login($existingUser, true);
            
            return redirect()->to('staffs');  

        } else {

            // create a new user
 
            $newUser                  = new User;
            $newUser->first_name      = $user->user['given_name'];
            $newUser->last_name       = $user->user['family_name'];
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->user_type_id    = 3;

            $newUser->avatar_url      = $user->avatar;
 
            $newUser->save();
         
            auth()->login($newUser, true);
            
            return redirect()->to('/clients');

        }
        
        return redirect()->to('/login');

    }

    public function redirectToProvider(){

        return Socialite::driver('google')->redirect();

    }


}
