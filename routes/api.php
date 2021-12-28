<?php

use App\Http\Controllers\APi\ArticleController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PostController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[LoginController::class,'register']);
Route::post('login', [LoginController::class,'login']);

Route::post('article-register',[LoginController::class,'register']);
Route::post('article-login', [LoginController::class,'login']);


Route::group(['middleware' => 'auth:api'], function () {


// -----------------------------Phone Recharge---------------------------
Route::post('create-post',[PostController::class,'addpost'])->name('create_post');
Route::get('total-points',[PostController::class,'totalpoints'])->name('total_points');
Route::post('request-send',[PostController::class,'sendrequest'])->name('request_send');
Route::get('request-accept',[PostController::class,'acceptrequest'])->name('request_accept');


// -------------------------------Article Task-------------------------------------- 

Route::get('article-show',[ArticleController::class,'showarticle']);
Route::post('article-like',[ArticleController::class,'artilcelike']);
Route::post('article-dislike',[ArticleController::class,'artilcedislike']);
Route::post('article-comment/{id}',[ArticleController::class,'artilcecomment']);
});