<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
 
use App\Models\Client;


class StaffAPI extends BaseController
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
        
        $staffs = User::where('user_type_id' , 4)->get();
 
        if (is_null($staffs)) {
            return $this->sendError('User not found.');
        }

        return response(['staffs' => $staffs], 201);

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
 
        $input = $request->all();
        $user  = new User();
 
        //$client_info->

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

        $input['password'] = Hash::make($input['password']);
        $input['user_type_id'] = 2;

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $user = User::create($input);

        $staffs['client_id']    = Auth::id();
        $staffs['user_id']      = $user_id;
        
        Staff::create($staffs);
   
        return $this->sendResponse(new UserResource($user), 'Staff created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
        $user = User::find($id);
        
        if (is_null($user)) {
            return $this->sendError('User not found.');
        }
   
        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $input = $request->all();
        $user = new User();

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
         
        $user->email        = $input["email"];
        $user->password     = $input['password'];
        $user->first_name   = $input['first_name'];
        $user->last_name    = $input['last_name'];
        $user->user_type_id = $input['user_type_id'];

        $user->save();
   
        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $user->delete();
   
        return $this->sendResponse([], 'User deleted successfully.');

    }
}
