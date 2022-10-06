<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Jobs;

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

Route::get('/',[JobController::class, 'index']);


//veq ni pun
Route::get('/puna/{job}', [JobController::class, 'show']);




Route::get('/layouts', function () {
    return view('layouts');
});

Route::resource('/jobs',JobController::class);
Route::resource('/users',UserController::class);


Route::get('/jobs/manage',[JobController::class,'manage'])->middleware('auth')->name('manage');


Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/user/authenticate',[UserController::class,'authenticate'])->name('authenticate');