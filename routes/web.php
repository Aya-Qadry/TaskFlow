<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AuthController ; 
use App\Http\Controller\HomeController ; 


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
    return view('welcome');
});

// Route::group(['middleware' => 'guest'] , function(){
    Route::get('/register' , [AuthController::class , 'register']) -> name('register') ; 
    Route::post('/register' , [AuthController::class , 'registerPost']) -> name('register.action') ; 
    Route::get('/login' , [AuthController::class , 'login']) -> name('login') ; 
    Route::post('/login' , [AuthController::class ,'loginPost']) -> name('login.action') ; 
// }) ; 

Route::get('/client-dashboard', function () {return view('client/client-dashboard'); });
Route::get('/director-dashboard', function () {return view('director/director-dashboard'); });

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/dashboard' , [AuthController::class , 'dashboard']) ; 
    Route::delete('/logout' , [AuthController::class , 'logout']) -> name('logout') ; 
});
