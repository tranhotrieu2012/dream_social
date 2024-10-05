<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('home');
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login/action', [UserController::class, 'login_action'])->name('login.action');
//-----------------Forgot password ---------------
Route::get('password/reset', [UserController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [UserController::class, 'reset'])->name('password.update');





