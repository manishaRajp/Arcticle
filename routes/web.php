<?php

use App\Http\Controllers\HomeController;
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
return view('frantend.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



  // like and dislike procces
  Route::get('like/{id}', [HomeController::class, 'like'])->name('like');
  Route::get('dislikes/{id}', [HomeController::class, 'user_dislikes'])->name('dislikes');