<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('IsLogin')->group(function()
{
    Route::get("/profile",[HomeController::class,"profile"])->name("home.profile"); 
});


Route::get('/', function () {
    return view('welcome');
});
//Authentication Routes
//Register 
Route::get("/register",[AuthController::class,"register"])->name("auth.register");
Route::post("/register",[AuthController::class,"handleregister"])->name("auth.handleregister");

// Login 
Route::get("/login",[AuthController::class,"login"])->name("auth.login");
Route::post("/login",[AuthController::class,"handlelogin"])->name("auth.handlelogin");
//logout
Route::get("/logout",[AuthController::class,"logout"])->name("auth.logout");
