<?php

use App\Http\Controllers\frontend\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RechagerController;
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

// Route::get('/', [BlogController::class, 'index'])->name('wellcome');

Route::get('/', function () {
return view('frantend.home');
});

Auth::routes();

Route::group(['middleware' => 'auth:web'], function () {
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/done/{id}',[HomeController::class,'done']);

 // like and dislike procces
Route::get('/like/{id}', [HomeController::class, 'like'])->name('like');
Route::get('dislikes/{id}', [HomeController::class, 'user_dislikes'])->name('dislikes');




// POST RECHAGE MODULE 

Route::resource('post',PostController::class);


// RECHARGER MODULE
Route::resource('rechger',RechagerController::class);


});
