<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\User;
use App\Models\UserDetails;
use App\Http\Controllers\API\BaseController as BaseController;
    
use Illuminate\Support\Facades\Hash;

use Validator;
use App\Http\Resources\Client as ClientResource;



class ClientController extends Controller
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
         
        $users = User::where('user_type_id' , 2)->get();
 
        if (is_null($users)) {
            return $this->sendError('User not found.');
        }

         return response(['users' => $users], 201);

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
   
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user['password']       = Hash::make($input['password']);
        $user['user_type_id']   = 2;
        $user['first_name']     = $input['first_name'];
        $user['last_name']      = $input['last_name'];
        $user['email']          = $input['email'];
        

    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $user_result           = User::create($user);
         

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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
        $input          = $request->all();
        $user           = new User();
        $user_details   = new UserDetails();

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
