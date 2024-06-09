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
})->name('landing');


// Route::group(['middleware' => 'guest'] , function(){
    Route::get('/register' , [AuthController::class , 'register']) -> name('register') ; 
    Route::post('/register' , [AuthController::class , 'registerPost']) -> name('register.action') ; 
    Route::get('/login' , [AuthController::class , 'login']) -> name('login') ; 
    Route::post('/login' , [AuthController::class ,'loginPost']) -> name('login.action') ; 
// }) ; 

Route::get('/client-dashboard', function () {return view('client/client-dashboard'); });
// Route::get('/director-dashboard', function () {return view('director/dashboard'); });
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/dashboard' , [AuthController::class , 'dashboard']) ; 
    Route::delete('/logout' , [AuthController::class , 'logout']) -> name('logout') ; 
});
Route::get('/projects/list', [ProjectController::class, 'list'])->name('projects.list');

    Route::get('/projects/settings', [ProjectController::class, 'settings'])->name('projects.settings');
    Route::put('/projects/settings', [ProjectController::class, 'updateSettings'])->name('projects.updateSettings');

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('edit/{project}', [ProjectController::class, 'edit'])->name('edit');
    Route::put('update/{project}', [ProjectController::class, 'update'])->name('update');
}); 

Route::resources([
    'projects' => ProjectController::class,
    //'director'  => DirectorController::class , 
]);

Route::delete('/director/destroyClient/{user}', [DirectorController::class, 'destroyClient'])->name('director.destroyClient');
Route::put('director/settings', [DirectorController::class, 'updateSettings'])->name('director.updateSettings');


Route::prefix('director')->name('director.')->group(function () {
    Route::get('createTeam', [DirectorController::class, 'createTeam'])->name('createTeam');
    Route::get('index', [DirectorController::class, 'index'])->name('index');
    Route::get('settings', [DirectorController::class, 'settings'])->name('settings');

    //Route::get('edit', [DirectorController::class, 'edit'])->name('edit');
    
    Route::get('destroy', [DirectorController::class, 'destroy'])->name('destroy');
    Route::get('projects', [DirectorController::class, 'projects'])->name('projects');
    Route::get('edit/{project}', [DirectorController::class, 'edit'])->name('edit');
    Route::put('update/{project}', [DirectorController::class, 'update'])->name('update');

    Route::delete('destroy/{project}', [DirectorController::class, 'destroy'])->name('destroy');

    Route::post('storeTeam', [DirectorController::class, 'storeTeam'])->name('storeTeam');

    // clients : 
    Route::get('indexClients', [DirectorController::class, 'indexClients'])->name('indexClients');

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


 // Routes for ProjectController, intended for clients
// Route::prefix('client')->name('client.')->group(function() {
//     Route::resource('projects', ProjectController::class);
// });

// Routes for DirectorController, intended for directors
// Route::prefix('director')->name('director.')->group(function() {
//     Route::resource('projects', DirectorController::class);
// });
