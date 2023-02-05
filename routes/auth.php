<?php

Route::get("/register", [\App\Http\Controllers\AuthController::class, 'register_view'])->name("register-view");
Route::post("/register/store", [\App\Http\Controllers\AuthController::class, 'register'])->name("register");
Route::get("/login", [\App\Http\Controllers\AuthController::class, 'login_view'])->name("login-view");
Route::post("/login/store", [\App\Http\Controllers\AuthController::class, 'login'])->name("login");
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


