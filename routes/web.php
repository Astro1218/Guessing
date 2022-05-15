<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/guess', "App\Http\Controllers\GuessController@index");
Route::post('/guess', "App\Http\Controllers\GuessController@guess");

Route::get('/history', "App\Http\Controllers\HistoryController@index");

Route::get('/charge', "App\Http\Controllers\ChargeController@index");

Route::post('/present', "App\Http\Controllers\ChargeController@present");

Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
