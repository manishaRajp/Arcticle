<?php

use App\Http\Controllers\frontend\ArticleController;
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


Route::get('/', function () {
    return view('frantend.home');
});

Auth::routes();
Route::get('/welcome', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth:web'], function () {

    //---------------------------------------Post--------------------------------- 
    Route::resource('post', PostController::class);

    //-------------------------------------Recharge--------------------------------
    Route::resource('rechger', RechagerController::class);

    // ------------------------------------Article Like and coment----------------

    Route::get('like/{id}', [ArticleController::class, 'like'])->name('like');
    Route::get('dislikes/{id}', [ArticleController::class, 'dislikes'])->name('dislikes');
    Route::Post('submit_comment/{id}', [ArticleController::class, 'comment'])->name('submit_comment');
});
