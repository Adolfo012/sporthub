<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\LogoutController; 
use App\Http\Controllers\PasswordController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TorneoController;
#Cache command: php artisan config:clear or php artisan route:clear

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Get Arguments --> get(route,NameController::class) || get(route[NameController::class,'functionController'])
//Ex: Route::get('equipos/create',[EquipoController::class,'create']); 
//Route::post('logout', [LogoutController::class,'logout'])->name('logout.index');
//return view('welcome');
//HomeController 
Route::get('/', HomeController::class);

// < Routes accessible only to unauthenticated users >
Route::middleware(['guest'])->group(function () { 
    //LoginController (App\Http\Controllers\LoginController)
    Route::get('login', [LoginController::class,'index'])->name('login.index');
    Route::post('login', [LoginController::class,'user_login'])->name('login.user');
    //Reset Password Accont
    Route::get('login/recover', [LoginController::class,'recover_show'])->name('login.recover');
    Route::post('login/recover', [LoginController::class,'recover_accont'])->name('login.accont');
    Route::get('reset-password/{token}', [PasswordController::class,'create'])->name('password.reset');
    Route::post('reset-password', [PasswordController::class,'store'])->name('password.update');
    //RegisterController (App\Http\Controllers\RegisterController)
    Route::get('register', [RegisterController::class,'index']);
    Route::post('register', [RegisterController::class,'register'])->name('register_user');
});

#--------------------------------------------------------------------------------------------------

   // < Routes accessible only to authenticated users >
Route::middleware(['auth'])->group(function () {
    //DashboardController (App\Http\Controllers\DashboardController)
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    //LogoutController (App\Http\Controllers\LogoutController)
    Route::post('dashboard', [LogoutController::class,'logout'])->name('logout.index');
    //EquipoController (App\Http\Controllers\EquipoController)
    //Route View Us
    Route::view('dashboard/us','dashboard/us')->name('us'); //Shows a view that will not interact with the database
    Route::controller(EquipoController::class)->group(function(){ //Group EquipoController get(route,functionController)
            Route::get('equipos' , 'index')->name('equipos.index');
            Route::get('equipos/create','create')->name('equipos.crear');
            Route::post('equipos/create','store')->name('store');    
            //Protected views for the "Representante" rol using middleware 
            Route::get('equipos/{equipo}','show')->name('equipos.show')->middleware('representante'); 
            Route::get('equipos/{equipo}/edit','edit')->name('equipos.edit')->middleware('representante');
            //---------------------------------------------------------------------------------------------
            Route::put('equipos/{equipo}','update')->name('equipos.update');             //Update "route::put"
            Route::delete('equipos/{equipo}','destroy')->name('equipos.destroy'); //Delete "route::delete"
            
    });
    Route::controller(TorneoController::class)->group(function(){ //Group TorneoController get(route,functionController)
        Route::get('torneos' , 'index')->name('torneos.index');
        Route::get('torneos/create','create')->name('torneos.crear');
        Route::post('torneos/create','store')->name('store');    
        //Protected views for the "Organizador" rol using middleware 
        Route::get('torneos/{torneo}','show')->name('torneos.show')->middleware('organizador'); 
        Route::get('torneos/{torneo}/edit','edit')->name('torneos.edit')->middleware('organizador');
        //---------------------------------------------------------------------------------------------
        Route::put('torneos/{torneo}','update')->name('torneos.update');             //Update "route::put"
        Route::delete('torneos/{torneo}','destroy')->name('torneos.destroy'); //Delete "route::delete"
        
});
});