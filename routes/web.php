<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController as Sample;
use Laravel\Socialite\Facades\Socialite;

use HTTP\Controllers\API\AuthController as AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if (!Auth::check()) {
       return redirect()->to('/login');
    }else{
       return redirect()->to('/clients');
    }

});
 
Auth::routes();

/* Client Login */

Route::get('/login', function () {
    return view('auth.login');
}); 

Route::get('logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout']);

Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);


//* Admin & Client Access 

Route::middleware('auth.basic')->group(function(){


    //* Admin Access Only 

    Route::middleware('is.admin')->group(function(){

    /* Client */

        Route::get('create_client', [ 'as' => 'create_client',  'uses' => 'ClientController@create_client']);
        Route::post('save_client', [ 'as' => 'save_client',     'uses' => 'ClientController@store']);
        Route::get('client/{id}', [ 'as' => 'edit.client',      'uses' => 'ClientController@edit']);
        Route::post('update', [ 'as' => 'update.client',        'uses' => 'ClientController@update']);
        Route::get('clients', [ 'as' => 'clients',              'uses' => 'ClientController@index']);
        Route::get('clients_show', [ 'as' => 'clients.show',    'uses' => 'ClientController@show']);
        Route::delete('delete_client/{id}', [ 'as' => 'delete_client', 'uses' => 'ClientController@destroy']);

    });

    /* Staff */

    Route::middleware('is.client')->group(function(){

        Route::get('create_staff',  [ 'as' => 'client',         'uses' => 'StaffController@create_client']);
        Route::post('save_staff',   [ 'as' => 'save_staff',     'uses' => 'StaffController@store']);
        Route::get('update_staff',  [ 'as' => 'update_staff',   'uses' => 'StaffController@update_staff']);
        Route::post('update_staff', [ 'as' => 'update_staff',   'uses' => 'StaffController@update']);
        Route::get('staffs',        [ 'as' => 'staffs',         'uses' => 'StaffController@index']);


    });

    /* Master Admin */

    Route::middleware('is.master_admin')->group(function(){

        Route::get('create_admin', [ 'as' => 'create_admin',  'uses' => 'AdminController@create_client']);
        Route::post('save_admin', [ 'as' => 'save_admin',     'uses' => 'AdminController@store']);
        Route::get('admin/{id}', [ 'as' => 'edit.admin',      'uses' => 'AdminController@edit']);
        Route::post('update', [ 'as' => 'update.admin',        'uses' => 'AdminController@update']);
        Route::get('admins', [ 'as' => 'admins',              'uses' => 'AdminController@index']);
        Route::get('admin_show', [ 'as' => 'admin.show',    'uses' => 'AdminController@show']);
        Route::delete('delete_admin/{id}', [ 'as' => 'delete_client', 'uses' => 'AdminController@destroy']);

    });

});

/* Admin Login */

Route::get('/admin_login', function () {
    return view('auth.admin_login');
}); 

 /* Google Login */

Route::get('redirect', [ 'as' => 'redirect', 'uses' => 'AuthController@redirectToProvider']);
Route::get('callback', [ 'as' => 'callback', 'uses' => 'AuthController@handleProviderCallback']);
 
  
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
