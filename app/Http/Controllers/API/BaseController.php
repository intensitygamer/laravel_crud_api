<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Validator;

use App\Http\Resources\Client as ClientResource;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function insert_user($request, $user_type_id){

        $input          = $request->all();
        $user           = new User();
  
        $validator      = Validator::make($input, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:users',
            'password'      => 'required'
        ]);
        
        if($validator->fails()){
 
            return redirect()->route('client.create')
            ->with('errors', $validator->errors() );

        }

        $user_updates['email']          = $input["email"];
        $user_updates['password']       = Hash::make($input['password']);
        $user_updates['first_name']     = $input['first_name'];
        $user_updates['last_name']      = $input['last_name'];
        $user_updates['user_type_id']   = $user_type_id;

        $user_result                    = User::create($user_updates);
        $user_id                        = $user_result->id;
  
        $user_details['user_id']        = $user_result->id ;
        $user_details['address']        = $input['address']  ;
        $user_details['street']         = $input['street']  ;
        $user_details['house_no']       = $input['house_no'] ;
        $user_details['city']           = $input['city'] ;
        $user_details['territory']      = $input['territory'] ;
        $user_details['postal_code']    = $input['postal_code'] ;
        $user_details['country']        = $input['country'] ;
 
        UserDetails::create($user_details);

        return $user_id;
    }

}
