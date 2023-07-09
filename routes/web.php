<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\BackendController::class)->group(function (){
    Route::get('/admin', 'index')->name('admin');
});

Route::controller(\App\Http\Controllers\FrontendController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/{url}', 'view');
    Route::get('/{url}/{url2}', 'view');
    Route::get('/{url}/{url2}/{url3}', 'view');
});
