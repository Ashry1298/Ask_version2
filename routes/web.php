<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
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
//Middleware 1
Route::middleware('IsLogin')->group(function () {
    Route::name('profile.')->group(function () {
        Route::get("/profile", [HomeController::class, "profile"])->name("index");
        Route::post("/Question/{id}", [QuestionController::class, "AskQuestion"])->name("AskQuestion");
    });
    Route::name('questions.')->group(function () {
        Route::view("all", 'profile.all')->name('all');
        Route::post("/store", [QuestionController::class, "store"])->name("store");
        Route::get('/show/{question:id}', [QuestionController::class, 'show'])->name('show');
    });

    Route::name('auth.')->group(function () {
        Route::get("/logout", [AuthController::class, "logout"])->name("logout");
        Route::get("/user/{username:username}", [AuthController::class, "search"])->name("search");
    });
    Route::post('/answer/{question:id}', [QuestionController::class, 'answer'])->name('answer.store');
});
//Middleware 2
Route::middleware('Isnot_Login')->group(function () {
    Route::name('auth.')->group(function () {
        Route::get("/register", [AuthController::class, "register"])->name("register");
        Route::post("/register", [AuthController::class, "handleregister"])->name("handleregister");
        Route::get("/login", [AuthController::class, "login"])->name("login");
        Route::post("/login", [AuthController::class, "handlelogin"])->name("handlelogin");
    });
});
Route::get('/', function () {
    return view('welcome');
});
