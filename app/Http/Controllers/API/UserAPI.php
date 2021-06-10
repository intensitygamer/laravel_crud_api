<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;

class UserAPI extends BaseController
{
    //

    public function index(){

        
        //$user        = Auth::user();
 
        // $users   = User::all("user_type_id", 2);
 
         $users   = User::all();
 
         return response(['users' => $users], 201);
  
     }

     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if (is_null($user)) {
            return $this->sendError('User not found.');
        }
   
        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }   
 

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {
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
   
        $user = User::create($user);
        
 
        //return $this->sendResponse(new UserResource($user), 'User created successfully.');
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
          
         
        $user['password']       = $input["email"];
        $user['user_type_id']   = $input['password'];
        $user['first_name']     = $input['first_name'];
        $user['last_name']      = $input['last_name'];
        $user['email']          = $input['email'];


        $user = User::where('id', $id)->update($user);
   
        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
   
        return $this->sendResponse([], 'User deleted successfully.');
    }

}
