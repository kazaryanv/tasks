<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

require 'auth.php';
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
Route::get('/' ,[AuthController::class, 'home'])->name('dashboard');
Route::get("/home", [AuthController::class, 'index'])->name("home");

Route::group(['middleware' => 'auth'] , function (){
    Route::group(['prefix' => 'admin' , 'middleware' => 'admin'] , function (){
        Route::get("/user", [AdminController::class, 'index'])->name("admin_home");
        Route::get("/user/update/{id}", [AdminController::class, 'update'])->name("update");
        Route::get("/user/delete/{id}", [AdminController::class, 'destroy'])->name("destroy");
    });
});



