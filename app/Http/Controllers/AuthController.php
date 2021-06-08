<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;


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
        $client  = new Client;
 
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

                $client_info = $client->where('user_id', $user->id)->first();       
                 
                $request->session()->put('client_info', $client);

                return redirect()->to('staffs');
            
            }
            
            // Staff Log In

            if($user->user_type_id == 4){

                activity()->log('Staff Log In');

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
    
                activity()->log('Admin Log In');

                return redirect()->to('clients');
            
            }

            if( $user->user_type_id == 1){

                activity()->log('Master Admin Log In');

                return redirect()->to('admins');
            
            }

        }

        return redirect('admin_login')->with('message', 'This User does not exist, check your details');

    }

    public function logout (Request $request) {
 
        Auth::logout();
        $request->session()->flush();

        activity()->log('User Log Out');

        return redirect()->to('login')->with('error', 'You have been successfully logged out!');;

    }
    

    public function handleProviderCallback(){

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // only allow people with @company.com to login

        // if(explode("@", $user->email)[1] !== 'schedeasy.com'){
        //     return redirect()->to('/');
        // }

        // check if they're an existing user

        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){

            activity()->log('Google Auth Login');

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
            
            activity()->log('Google Auth Register');

            auth()->login($newUser, true);
            
            activity()->log('Google Auth Login');

            return redirect()->to('/clients');

        }
        
        return redirect()->to('/login');

    }

    public function redirectToProvider(){

        return Socialite::driver('google')->redirect();

    }


}
