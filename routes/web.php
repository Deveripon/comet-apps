<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\PermissionController;


//Admin Pages routes

Route::group(['middleware' => 'admin.redirect'],function(){
    Route::get('/login',[AdminPageController::class,'ShowLoginPage']) -> name('login.page');
    Route::post('/login',[AdminAuthController::class,'login']) -> name('login');

});




//Admin Auth routes
Route::group(['middleware'=>'admin'],function(){
    Route::get('/dashboard',[AdminPageController::class,'ShowDashboardPage']) -> name('dashboard.page');
    Route::get('logout',[AdminAuthController::class,'logout']) -> name('logout');
    Route::resource('permission',PermissionController::class);
    Route::resource('role',RoleController::class);
});
