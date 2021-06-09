<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
//use HTTP\Controllers\API\AuthController as AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    [   
        'namespace' => 'API',
     ],  function () {
    

    Route::post('login', 'AuthController@login');
    
    Route::post('admin_login', 'AuthController@admin_login');

    //Route::group([  'middleware'=>'auth:api'], function() {

       // Route::post('user', 'UserController@store');
       
        Route::get('users', 'User@index');
        Route::get('user/{id}', 'User@show');
        Route::put('user/{id}', 'User@update');
        Route::delete('user/{id}', 'User@destroy');

        Route::post('user', 'User@store');


        Route::get('staffs', 'Staff@index');
        Route::post('staff', 'Staff@store');
        Route::get('staff/{id}', 'Staff@show');
        Route::put('staff/{id}', 'Staff@update');
        Route::delete('staff/{id}', 'Staff@destroy');
       
        Route::post('client', 'Client@store');
        
        Route::get('admin', 'User@show_admins');

        Route::get('logout', 'AuthController@logout');

        
  //  });
 
});
 

