<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AuthController ; 
use App\Http\Controller\HomeController ; 
use App\Http\Controllers\ProjectController ; 
use App\Http\Controllers\DirectorController ; 


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('landing');
});

// Route::group(['middleware' => 'guest'] , function(){
    Route::get('/register' , [AuthController::class , 'register']) -> name('register') ; 
    Route::post('/register' , [AuthController::class , 'registerPost']) -> name('register.action') ; 
    Route::get('/login' , [AuthController::class , 'login']) -> name('login') ; 
    Route::post('/login' , [AuthController::class ,'loginPost']) -> name('login.action') ; 
// }) ; 

Route::get('/client-dashboard', function () {return view('client/client-dashboard'); });
Route::get('/director-dashboard', function () {return view('director/dashboard'); });

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/dashboard' , [AuthController::class , 'dashboard']) ; 
    Route::delete('/logout' , [AuthController::class , 'logout']) -> name('logout') ; 
});

Route::resources([
    'projects' => ProjectController::class,
    // 'director'  => DirectorController::class , 
]);

Route::prefix('director')->name('director.')->group(function () {
    Route::get('createTeam', [DirectorController::class, 'createTeam'])->name('createTeam');
    Route::get('index', [DirectorController::class, 'index'])->name('index');
    Route::get('projects', [DirectorController::class, 'projects'])->name('projects');
    Route::post('storeTeam', [DirectorController::class, 'storeTeam'])->name('storeTeam');
});

 // Routes for ProjectController, intended for clients
// Route::prefix('client')->name('client.')->group(function() {
//     Route::resource('projects', ProjectController::class);
// });

// Routes for DirectorController, intended for directors
// Route::prefix('director')->name('director.')->group(function() {
//     Route::resource('projects', DirectorController::class);
// });
