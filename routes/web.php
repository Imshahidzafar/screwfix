<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AddCompanyController;
use App\Http\Controllers\CountryStateCityController;


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

Route::get('add',[CarController::class,'create'])->name('addcar');
Route::post('add',[CarController::class,'store'])->name('adcar');
Route::get('car',[CarController::class,'index'])->name('car');
Route::get('edit/{id}',[CarController::class,'edit'])->name('editcar');
Route::post('edit/{id}',[CarController::class,'update'])->name('edit');
Route::delete('{id}',[CarController::class,'destroy'])->name('delete');


Route::get('addcompany', [AddCompanyController::class, 'addcompany']);
Route::get('country-state-city',[CountryStateCityController::class,'index']);
Route::post('get-states-by-country',[CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class, 'getCity']);
Route::get('jquery',[CountryStateCityController::class, 'jquery']);
Route::post('savecompany',[AddCompanyController::class, 'savecompany']);