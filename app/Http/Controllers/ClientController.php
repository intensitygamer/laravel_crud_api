<?php

namespace App\Http\Controllers;


 
use App\Models\User;
use App\Models\Activity;
use App\Models\Client;
use App\Models\Staff;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Validator;
use Hash;


class ClientController extends Controller
{   

    public function dashboard(Request $request)
    {
        $staffs = Staff::get();

        return view('clients.dashboard')->with('staffs', $staffs);

    }
 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $clients = Client::get();       
        
        $client_info = $request->session()->get('client_info');

        return view('clients.index', compact('clients'));

    }

    
    public function create_client(Request $request)
    {
        
        return view('clients.create');

    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input          = $request->all();
        $user           = new User();
 

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        
        if($validator->fails()){
 

            return redirect()->route('client.create')
            ->with('errors', $validator->errors() );

        }

        $user_updates['email']          = $input["email"];
        $user_updates['password']       = Hash::make($input['password']);
        $user_updates['first_name']     = $input['first_name'];
        $user_updates['last_name']      = $input['last_name'];
        $user_updates['user_type_id']   = 2;

        $user_result                   = User::create($user_updates);
        $user_id                       = $user_result->id;

        $user_details['user_id']        = $user_result->id ;
        $user_details['address']        = $input['address']  ;
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::create($user_details);


        $client_info['crm_url']        = $input['crm_url'];

        $client_info['user_id']        = $user_id;

        Client::create($client_info);

        return redirect()->route('clients')
                        ->with('success','Clients added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){

        $client_info = Client::where(['id' => $request->id])->first();       
        
        $activities = Activity::where(['causer_id' => $client_info->user_id])->orderBy('id', 'DESC')->get();
 
        return view('clients.show', compact('client_info', 'activities'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //        
        
        $input          = $request->all();

        $validator      = Validator::make($input, [
                            'first_name' => 'required',
                            'last_name' => 'required',
                            'email' => 'required',
                        ]);
       
        $user           = new User();
  
        if($validator->fails()){

            return redirect()->route('update.client')
            ->with('success','Clients updated successfully');

        }

        $user_updates['email']          = $input["email"];
        $user_updates['first_name']     = $input['first_name'];
        $user_updates['last_name']      = $input['last_name'];
        
        
        $user = User::where('id', $request->user_id)->first();


        $user_details['address']        = $input['address']  ;
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::where('user_id', $request->id)->update($user_details);

        $client_details['crm_url']    = $input['crm_url'] ;
        $client_details['name']       = $input['client_name'] ;

        Client::where('user_id', $request->id)->update($client_details);
    
        return redirect()->route('clients')
                        ->with('success','Clients updated successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Client $client)
    {

        $client = Client::find( $request->id ); 
        
        return view('clients.edit', compact('client'));

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request, User $user)
    {

        //

        $client = Client::find( $request->id ); 
        
        return view('clients.change_password', compact('client'));

    }

    public function update_password(Request $request, User $user)
    {

        //

        $client = Client::find( $request->id ); 
  
        User::where('id', $request->id)->update($user_updates);
 
        return view('clients', compact('client'));

    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    { 

        $id = $request->id;

        $client = Client::find( $id );

        $client->delete();
 
        return redirect()->route('clients')
                        ->with('success','Clients deleted successfully');

    }
}
