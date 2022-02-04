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

Route::get('/', function () {
    return view('welcome');
});
Route::get('search_user',[App\Http\Controllers\UserController::class, 'search'])->name('search_user');
Auth::routes();
Route::group(['middleware'=> 'auth'], function(){
   Route::resource('/customer','App\Http\Controllers\CustomerController');
   Route::resource('/clothing','App\Http\Controllers\ClothingController');
   Route::resource('/color','App\Http\Controllers\ColorController');
   Route::resource('/package','App\Http\Controllers\PackageController');
   
   Route::get('search_package',[App\Http\Controllers\PackageController::class, 'search'])->name('search_package');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/admin/{id}/manage-role',[App\Http\Controllers\AdminController::class, 'manage']);
Route::post('/admin/{id}/update',[App\Http\Controllers\AdminController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});