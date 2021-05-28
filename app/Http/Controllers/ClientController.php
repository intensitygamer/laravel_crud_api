<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\API\BaseController as BaseController;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = User::get();       
 
        return view('clients.index')->with('clients', $clients);

    }

    
    public function create_client(Request $request)
    {
        
        return view('clients.create');

    }

    
    public function update_client_form(Request $request)
    {
        
        return view('clients.update');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input          = $request->all();
        //$user_details   = new UserDetails();
        $user           = new User();
 

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        
        if($validator->fails()){

            return view('clients.create')->with('errors', $validator->errors() );

        }

        $user_inputs['email']          = $input["email"];
        $user_inputs['password']       = Hash::make($input['password']);
        $user_inputs['first_name']     = $input['first_name'];
        $user_inputs['last_name']      = $input['last_name'];
        $user_inputs['user_type_id']   = 2;

        $user_result                   = User::create($user_inputs);
        $user_id                       = $user_result->id;

        $user_details['user_id']        = $user_result->id ;
        $user_details['address']        = $input['address']  ;
        $user_details['street']        = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::create($user_details);

        return view('clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //        
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
       
        $input          = $request->all();
        
        //$user_details   = new UserDetails();
        $user           = new User();
  
        if($validator->fails()){

            return view('clients.create')->with('errors', $validator->errors() );

        }

        $user_inputs['email']          = $input["email"];
        $user_inputs['password']       = Hash::make($input['password']);
        $user_inputs['first_name']     = $input['first_name'];
        $user_inputs['last_name']      = $input['last_name'];
        $user_inputs['user_type_id']   = 2;

        User::where('id', $user->id)->update($user_inputs);
 
        $user_details['user_id']        = $user_result->id ;
        $user_details['address']        = $input['address']  ;
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::create($user_details);

        $client->update($request->all());
    
        return redirect()->route('clients')
                        ->with('success','Clients updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
    
        return redirect()->route('clients')
                        ->with('success','Clients deleted successfully');

    }
}
