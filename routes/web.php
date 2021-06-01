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

//Route::middleware('is.admin')->group(function(){

    /* Client */

    Route::get('create_client', [ 'as' => 'create_client',  'uses' => 'ClientController@create_client']);
    Route::post('save_client', [ 'as' => 'save_client',     'uses' => 'ClientController@store']);
    Route::get('client/{id}', [ 'as' => 'edit.client',      'uses' => 'ClientController@edit']);
    Route::post('update', [ 'as' => 'update.client',        'uses' => 'ClientController@update']);
    Route::get('clients', [ 'as' => 'clients',              'uses' => 'ClientController@index']);
    Route::get('clients_show', [ 'as' => 'clients.show',    'uses' => 'ClientController@show']);
    Route::delete('delete_client/{id}', [ 'as' => 'delete_client', 'uses' => 'ClientController@destroy']);

    /* Staffs */

    Route::get('create_staff',  [ 'as' => 'client',         'uses' => 'StaffController@create_client']);
    Route::post('save_staff',   [ 'as' => 'save_staff',     'uses' => 'StaffController@store']);
    Route::get('update_staff',  [ 'as' => 'update_staff',   'uses' => 'StaffController@update_staff']);
    Route::post('update_staff', [ 'as' => 'update_staff',   'uses' => 'StaffController@update']);
    Route::get('staffs',        [ 'as' => 'staffs',         'uses' => 'StaffController@index']);


    /* Admin */

    Route::get('create_staff',  [ 'as' => 'client',         'uses' => 'Admin@create_client']);
    Route::post('save_staff',   [ 'as' => 'save_staff',     'uses' => 'AdminController@store']);
    Route::get('update_staff',  [ 'as' => 'update_staff',   'uses' => 'AdminController@update_staff']);
    Route::post('update_staff', [ 'as' => 'update_staff',   'uses' => 'AdminController@update']);
    Route::get('staffs',        [ 'as' => 'staffs',         'uses' => 'AdminController@index']);


    
//});

/* Admin Login */

Route::get('/admin_login', function () {
    return view('auth.admin_login');
}); 

 /* Google Login */

Route::get('redirect', [ 'as' => 'redirect', 'uses' => 'AuthController@redirectToProvider']);
Route::get('callback', [ 'as' => 'callback', 'uses' => 'AuthController@handleProviderCallback']);
 
  
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
