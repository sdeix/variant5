<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutoController;
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

Route::any('/',[AutoController::class,'index']);

Route::any('/register', [AuthController::class,'register'] );
Route::any('/login', [AuthController::class,'login'] )->name('login');
Route::get('/logout', [AuthController::class,'logout'] );


Route::any('/cars', [AutoController::class,'cars'] )->middleware('auth');;
Route::any('/clients', [AutoController::class,'clients'] )->middleware('auth');;
Route::any('/claims', [AutoController::class,'claims'] )->middleware('auth');;

Route::any('/deleteclaim/{id}', [AutoController::class,'deleteclaim'] )->middleware('auth')->name('deleteclaim');
Route::any('/deletecar/{id}', [AutoController::class,'deletecar'] )->middleware('auth')->name('deletecar');
Route::any('/deleteclient/{id}', [AutoController::class,'deleteclient'] )->middleware('auth')->name('deleteclient');

