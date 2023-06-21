<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\LoginController;
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
    return view('login.login');
})->name('login');

Route::middleware(['auth'])->group(function(){

    //route admin mulai
    Route::get('/admin/dashboard',[TalentController::class,'dashboard']);
    
    Route::get('/admin/talent', function () {
        return view('admin.talent',['title'=>'Talent - PT WARNA EMAS INDONESIA']);
    });
    
    
    Route::get('/admin/database',[TalentController::class,'index']);
    Route::get('/admin/{id}/edit',[TalentController::class,'edit']);
    Route::put('/admin/{id}',[TalentController::class,'update']);
    Route::delete('/admin/{id}',[TalentController::class,'destroy']);
    
    
    Route::post('/simpantalent',[TalentController::class,'store']);
    //route admin selesai
    
    //route manager mulai
    Route::get('/manager/dashboard', function () {
        return view('manager.manager-dashboard');
    });
});

//route login
Route::post('/login',[LoginController::class,'authen']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/logout',[LoginController::class,'logout']);


// Route::get('/edit', function () {
    //     return view('admin.edit');
    // });x
    
// Route::get('/edit/{username}',[TalentController::class,'edit']);