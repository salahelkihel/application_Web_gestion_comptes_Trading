<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompteController;

use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ComptetradingController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\comptetController;


use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\adminMiddleware;
;
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
    return view('loginpage');
});
Route::get('/add_comptetrading', function () {
    return view('compte_comptetrading');
});
Route::get('/gestion_trader', function () {
    return view('gestion_trader');
});

        // -----------------------------login-----------------------------------------
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/users', [UserController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 



 
  

    Route::group(['middleware'=>['adminMiddleware']], function(){ 

      
 Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');
    //responsable
    Route::get('/responsable',[ResponsableController::class,'index']);
    Route::post('responsable',[ResponsableController::class,'store'])->name('responsables.store');
    Route::put('/update_res/{id}',[ResponsableController::class,'update'])->name('update_res');
    Route::delete('/delete_res/{id}',[ResponsableController::class,'delete'])->name('delete_res');
    Route::post('/importresponsable',[ResponsableController::class,'importform'])->name('import.responsable');
    Route::get('responsable/export/',[ResponsableController::class,'export'])->name('res.export');  
    //equipe
    Route::get('/equipe',[EquipeController::class,'index']);
    Route::post('equipe',[EquipeController::class,'store'])->name('equipe.store');
    Route::put('/update_eq/{id}',[EquipeController::class,'update'])->name('update_eq');
    Route::delete('/delete_eq/{id}',[EquipeController::class,'delete'])->name('delete_eq');
    Route::post('/importequipe',[EquipeController::class,'importform'])->name('import.equipe');
    Route::get('equipe/export/',[EquipeController::class,'export'])->name('eq.export');

    //compte
    Route::get('/compte',[CompteController::class,'index']);

    Route::post('compte',[CompteController::class,'add'])->name('compte.add');
    Route::put('/update_compte/{id}',[CompteController::class,'update_compte'])->name('update_compte');
    Route::post('/edite_compte/{id}',[CompteController::class,'edit'])->name('edit.compte');
    
    Route::delete('/delete/{id}',[CompteController::class,'delete'])->name('delete');
    Route::post('/importcompte',[CompteController::class,'importform'])->name('import.compte');
    Route::get('compte/export/',[CompteController::class,'export'])->name('export');
    Route::get('/getlibel',[CompteController::class,'edit']);

    //compte trading
   Route::post('compte_trading',[ComptetradingController::class,'addnew'])->name('add.comptetrading');
    Route::get('/comptetrading',[ComptetradingController::class,'index']);
    Route::post('comptetrading',[ComptetradingController::class,'add'])->name('comptetrading.add');
    Route::put('/update_comptetrading/{id}',[ComptetradingController::class,'update_compteT'])->name('comptetrading.update');
    Route::delete('/delete_comptetrading/{id}',[ComptetradingController::class,'delete'])->name('delete.comptetrading');
    Route::post('/importtrading',[ComptetradingController::class,'importform'])->name('import.trading');
    Route::get('comptetrading/export/',[ComptetradingController::class,'export'])->name('comptt.export');
    //formation
    Route::get('/formation',[FormationController::class,'index']);
    Route::post('formation',[FormationController::class,'add'])->name('formation.add');
    Route::put('/update_formation/{id}',[FormationController::class,'update'])->name('update_formation');
    Route::delete('/delete_formation/{id}',[FormationController::class,'delete'])->name('delete_formation');
    Route::post('/importformation',[FormationController::class,'importform'])->name('import.formation');
    Route::get('formation/export/',[FormationController::class,'export'])->name('fr.export');
    //competition
    Route::get('/competition',[CompetitionController::class,'index']);
    Route::post('competition',[CompetitionController::class,'add'])->name('competition.add');
    Route::put('/update_competition/{id}',[CompetitionController::class,'update'])->name('competition.update');
    Route::delete('/delete_competition/{id}',[CompetitionController::class,'delete'])->name('competition.delete');
    Route::post('/importcompetition',[CompetitionController::class,'importform'])->name('import.competition');
    Route::get('competition/export/',[CompetitionController::class,'export'])->name('com.export');
//traders
Route::get('/gestion_trader',[TraderController::class,'index']);
Route::post('/importtrader',[TraderController::class,'importform'])->name('import.Trader');

//users
Route::put('/update_user/{id}',[UserController::class,'update'])->name('user.update');
Route::post('/add_user',[UserController::class,'add'])->name('user.add');
Route::get('/edit_user/{id}',[UserController::class,'edit']);
Route::delete('/delete_user/{id}',[UserController::class,'delete'])->name('user.delete');

});