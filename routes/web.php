<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\adminController;
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
    Route::resource('user',adminController::class);
    Route::get('user-status-update/{id}',[adminController::class,'stausUpdate']) -> name('user-status');
    Route::get('user-trash-update/{id}',[adminController::class,'trashUpdate']) -> name('user-trash');
    Route::get('user-trash-restore/{id}',[adminController::class,'trashRestore']) -> name('user-trash-restore');
    Route::get('trash',[adminController::class,'ShowTrashPage']) -> name('trash.page');
    Route::get('profile-page',[adminController::class,'ShowProfilePage']) -> name('profile.page');
    Route::post('profile_update/{id}',[adminController::class,'UpdateProfile']) -> name('profile.update');
    Route::post('profile_pic_update/{id}',[adminController::class,'UpdateProfilePic']) -> name('profile.photo.update');
    Route::get('settings-page',[adminController::class,'ShowSettingsPage'])->name('settings.page');
    Route::post('change-password',[adminController::class,'ChangePassword'])->name('change.password');
});
