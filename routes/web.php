<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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


Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'tanques', 'as' => 'tanks.', 'middleware' => 'auth'], function () {
    Route::get('/criar', [App\Http\Controllers\TankController::class, 'create'])->name('create');
    Route::get('', [App\Http\Controllers\TankController::class, 'index'])->name('index');
    Route::post('', [App\Http\Controllers\TankController::class, 'store'])->name('store');
    Route::get('/{id}', [App\Http\Controllers\TankController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\TankController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\TankController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'peixes', 'as' => 'fish.', 'middleware' => 'auth'], function () {
    Route::get('/criar', [App\Http\Controllers\FishController::class, 'create'])->name('create');
    Route::get('', [App\Http\Controllers\FishController::class, 'index'])->name('index');
    Route::post('', [App\Http\Controllers\FishController::class, 'store'])->name('store');
    Route::get('/{id}', [App\Http\Controllers\FishController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\FishController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\FishController::class, 'delete'])->name('delete');
});
