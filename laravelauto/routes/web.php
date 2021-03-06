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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/auto/check', 'App\Http\Controllers\MainConroller@auto_check');
Route::get('/brand', 'App\Http\Controllers\BrandController@brand');


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

