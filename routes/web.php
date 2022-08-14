<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\AdminAuthController;


//Admin Pages routes
Route::get('/login',[AdminPageController::class,'ShowLoginPage']) -> name('login.page');
Route::get('/dashboard',[AdminPageController::class,'ShowDashboardPage']) -> name('dashboard.page');


//Admin Auth routes
Route::post('/login',[AdminAuthController::class,'login']) -> name('login');
Route::get('logout',[AdminAuthController::class,'logout']) -> name('logout');