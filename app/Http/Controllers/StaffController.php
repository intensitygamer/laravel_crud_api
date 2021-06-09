<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Staff;
use App\Models\UserDetails;
use Validator;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    //

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $staffs = Staff::get();
         
        return view('staffs.index')->with('staffs', $staffs);

    }

    
    public function create_staff(Request $request)
    {
        
        return view('staffs.create');

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\User $user
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
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::create($user_details);

        $staffs['client_id']    = Auth::id();
        $staffs['user_id']      = $user_id;
 
        Staff::create($staffs);

        return redirect()->route('staffs')
                        ->with('success','Staffs updated successfully');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff $staff 
     * @return \Illuminate\Http\Response
     */
    
    public function show(Request $request, $id){

        $staff = Staff::find(['id' => $id])->first();       
 
        return view('staffs.show', compact('staff'));

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
       
        
        //$user_details   = new UserDetails();
        $user           = new User();
  
        if($validator->fails()){

            return view('clients.create')->with('errors', $validator->errors() );
        }

        $user_inputs['email']          = $input["email"];
        $user_inputs['first_name']     = $input['first_name'];
        $user_inputs['last_name']      = $input['last_name'];
        //$user_inputs['user_type_id']   = 2;

        User::where('id', $request->id)->update($user_inputs);
 
       //$user_details['user_id']        = $user_result->id ;
        $user_details['address']        = $input['address']  ;
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
        
        echo $request->id;
 
        UserDetails::where('user_id', $request->id)->update($user_details);

        //$client->update($request->all());
    
        return redirect()->route('staffs')
                        ->with('success','Staffs updated successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {

        $staff = Staff::find(['id' => $request->id])->first(); 
  
        return view('staffs.edit', compact('staff'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    { 
        //

        $id = $request->id;

        $client = Client::find( $id );

        $client->delete();
 
        return redirect()->route('clients')
                        ->with('success','Clients deleted successfully');

    }
}
