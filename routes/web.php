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
Route::group(['prefix' => 'gestao', 'as' => 'management.', 'middleware' =>'auth'], function () {
    Route::get('/criar', [App\Http\Controllers\ManagementController::class, 'create'])->name('create');
    Route::post('/criar', [App\Http\Controllers\ManagementController::class, 'store'])->name('store');
});
