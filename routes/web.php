<?php

use Illuminate\Support\Facades\Route;

/*
 * Login
 */

// DB::listen( function($query){
// 	dump( $query->sql ?? $query->sql() );
// });

/*
 * Auth
 */

Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');

Route::post('/login',	[App\Http\Controllers\Auth\LoginController::class, 'authenticate'])
->name('login.auth');

Route::get('/logout',	[App\Http\Controllers\Auth\LoginController::class, 'logout'])
->name('logout');

/*
 * Register
 */
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

Route::resource('notes', App\Http\Controllers\NoteController::class);

Route::get('/', [
		App\Http\Controllers\HomeController::class,
		'index'
	])->name('home');