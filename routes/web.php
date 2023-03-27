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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('IsLogin')->group(function () {
    Route::get("/all", [QuestionController::class, 'all'])->name('questions.all');
    Route::get('/show/{id}', [QuestionController::class, 'show'])->name('question.show');
    Route::post('/answer/{id}', [QuestionController::class, 'answer'])->name('answer.store');
    Route::post("/store", [QuestionController::class, "store"])->name("question.store");
    Route::get("/profile", [HomeController::class, "profile"])->name("profile.index");
    Route::get("/profile/{username}", [HomeController::class, "search"])->name("profile.search");
    Route::get("/logout", [AuthController::class, "logout"])->name("auth.logout");
});

Route::post("/Question/{id}", [QuestionController::class, "AskQuestion"])->name("profile.AskQuestion");
Route::get('/greeting', function () {
    return 'Hello World';
});
Route::middleware('Isnot_Login')->group(function () {
    Route::get("/register", [AuthController::class, "register"])->name("auth.register");
    Route::post("/register", [AuthController::class, "handleregister"])->name("auth.handleregister");
    Route::get("/login", [AuthController::class, "login"])->name("auth.login");
    Route::post("/login", [AuthController::class, "handlelogin"])->name("auth.handlelogin");
});
