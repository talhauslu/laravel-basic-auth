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

Route::get('/', function () {
    return view('homepage');
});
Route::post('/loginprocess', [\App\Http\Controllers\Auth\AuthController::class, 'loginProcess'])->name('logincheck');
Route::post('/registrationprocess', [\App\Http\Controllers\Auth\AuthController::class, 'registrationProcess'])->name('registrationcheck');
Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/register', function(){
    return view('auth.registerForm');
})->name('registrationform');
Route::get('/login', function(){
    return view('auth.loginForm');
})->name('loginform');
Route::get('/saved', function () {
    return view('saved');
})->middleware('auth')->name('saved');
Route::get('/addcontent', function () {
    return view('addcontent');
})->middleware('auth')->name('addcontent');
Route::get('/explore', function () {
    return view('explore');
})->name('explore');
Route::get('/trends', function () {
    return view('trends');
})->name('trends');
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

