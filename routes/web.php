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
    return redirect(\route('home'));
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'tanque', 'as' => 'tanks.', 'middleware' => 'auth'], function () {
    Route::get('/criar', [App\Http\Controllers\TankController::class, 'create'])->name('create');
    Route::get('', [App\Http\Controllers\TankController::class, 'index'])->name('index');
    Route::post('/criar', [App\Http\Controllers\TankController::class, 'store'])->name('store');
});
