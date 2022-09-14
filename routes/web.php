<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {return view('homepage');});
Route::post('/loginprocess', [\App\Http\Controllers\Auth\AuthController::class, 'loginProcess'])->name('logincheck');
Route::post('/registrationprocess', [\App\Http\Controllers\Auth\AuthController::class, 'registrationProcess'])->name('registrationcheck');
Route::get('/register', function () {return view('auth.registerForm');})->name('registrationform');
Route::get('/login', function () {return view('auth.loginForm');})->name('loginform');
Route::get('/explore', function () {return view('explore');})->name('explore');
Route::get('/trends', function () { return view('trends');})->name('trends');


Route::middleware('auth')->group(function () {

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/saved', function () {return view('saved');})->name('saved');
    Route::get('/addcontent', function () {return view('addcontent');})->name('addcontent');
    Route::get('/profile', function () {return view('profile', ['data' => Auth::user()]);})->name('profile');

});

Route::middleware('checkadmin')->group(function () {

    Route::get('/admin', function () {return view('admin');})->name('admin');
    Route::get('/newuser', function () {return view('adduser');})->name('adduser');

});


