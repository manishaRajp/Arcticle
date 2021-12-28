<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RechargeController;

// ------------------------------Admin ForgetPassword--------------------------
Route::get('foregtpassword', function () {
return view('Backend.Admin.forget_email');
})->name('foregtpassword');

Route::get('resetpassword', function () {
return view('Backend.Admin.reset');
})->name('resetpassword');


//--------------------------------------- Admin Login-------------------------------
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginAdminController::class, 'showLoginForm'])->name('admin_login');
    Route::post('login', [LoginAdminController::class, 'login']);
    Route::post('logout', [LoginAdminController::class, 'logout'])->name('admin_logout');
});


// --------------------------------------Dashbooard View------------------------------
Route::group(['middleware' => 'auth:admin'], function () {
Route::get('/dasboard', function () {
    return view('Backend.Admin.dashboard');
})->name('dasboard');


//--------------------------------------Admin Profile Module---------------------------
Route::get('/profile', [AdminController::class, 'profileview'])->name('profile_view');
Route::post('/profile-update', [AdminController::class, 'profileupdate'])->name('profile_update');
Route::get('change-view', [AdminController::class, 'changePasswordview'])->name('view');
Route::post('change-pass', [AdminController::class, 'changePassword'])->name('change_pass');


//--------------------------------------category--------------------------- 
Route::resource('category',CategoryController::class);


//--------------------------------------Article---------------------------- 
Route::resource('article',ArticleController::class);



//-------------------------------------User display-----------------------
Route::resource('user',UserController::class);


//------------------------------------Recharge display--------------------
Route::resource('recharge',RechargeController::class);
Route::get('recharge-status',[RechargeController::class,'Rechargestatus'])->name('recharge-status');
Route::get('mail-send',[RechargeController::class,'mail'])->name('mail_send');


});
