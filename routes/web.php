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
        return redirect()->to('/login   ');
    }else{

    }

});

//Auth::routes();

Auth::routes();

Route::get('/login', function () {
    return view('auth.login');
}); 

Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);


/* Client */

Route::get('create_client', [ 'as' => 'client', 'uses' => 'ClientController@create_client']);
Route::post('save_client', [ 'as' => 'save_client', 'uses' => 'ClientController@store']);
Route::get('update_client', [ 'as' => 'update_client', 'uses' => 'ClientController@update_client_form']);
Route::post('update_client', [ 'as' => 'update_client', 'uses' => 'ClientController@update']);
Route::get('clients', [ 'as' => 'clients', 'uses' => 'ClientController@index']);
 


/* Client */

Route::get('/admin_login', function () {
    return view('admin_login');
}); 
 
Route::get('redirect', [ 'as' => 'redirect', 'uses' => 'AuthController@redirectToProvider']);
Route::post('callback', [ 'as' => 'callback', 'uses' => 'AuthController@handleProviderCallback']);
 

  


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
