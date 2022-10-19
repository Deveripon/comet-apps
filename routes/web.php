<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\portSingleController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\VisionController;
use App\Http\Controllers\admin\PostTagController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\ExpertiseController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ProductTagController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\admin\PostCategoryController;
use App\Http\Controllers\admin\ProductCategoryController;

//Admin Pages routes

Route::group(['middleware' => 'admin.redirect'], function () {
    Route::get('/login', [AdminPageController::class, 'ShowLoginPage'])->name('login.page');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
});




//Admin Auth routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminPageController::class, 'ShowDashboardPage'])->name('dashboard.page');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', adminController::class);
    Route::get('/user-status-update/{id}', [adminController::class, 'stausUpdate'])->name('user-status');
    Route::get('/user-trash-update/{id}', [adminController::class, 'trashUpdate'])->name('user-trash');
    Route::get('/user-trash-restore/{id}', [adminController::class, 'trashRestore'])->name('user-trash-restore');
    Route::get('/trash', [adminController::class, 'ShowTrashPage'])->name('trash.page');
    Route::get('/profile-page', [adminController::class, 'ShowProfilePage'])->name('profile.page');
    Route::post('/profile_update/{id}', [adminController::class, 'UpdateProfile'])->name('profile.update');
    Route::post('/profile_pic_update/{id}', [adminController::class, 'UpdateProfilePic'])->name('profile.photo.update');
    Route::post('/change-password', [adminController::class, 'ChangePassword'])->name('change.password');

    //Settings Route
    Route::resource('/settings', SettingsController::class);
    // Slider Route
    Route::resource('/slider', SliderController::class);
    //testimonialController route
    Route::resource('/testimonial', TestimonialController::class);
    //Client Controller Route
    Route::resource('/client', ClientController::class);
    //Expertise Controller Route
    Route::resource('/expertise', ExpertiseController::class);
    //vision Controller Route
    Route::resource('/vision', VisionController::class);
    //Portfolio Category Route
    Route::resource('/port_category', CategoryController::class);
    //Portfolio Controller Route
    Route::resource('/portfolio', PortfolioController::class);
    //Post Category Route
    Route::resource('post/category', PostCategoryController::class);
    //Post Tags Route
    Route::resource('post/tags', PostTagController::class);
    //Blog Post Route
    Route::resource('/post', PostController::class);
    //product category route
    Route::resource('product-category',ProductCategoryController::class);
    //product tag route
    Route::resource('product-tag',ProductTagController::class);
    //product route
    Route::resource('product', ProductController::class);



   
});



// Frondend pages routes


// Show Home Page
Route::get('/', [FrontendController::class, 'ShowHomePage'])->name('home.page');
Route::get('/single_portfolio/{slug}', [FrontendController::class, 'ShowSinglePortfolioPage'])->name('single_portfolio.page');
Route::get('/blog', [FrontendController::class, 'ShowBlogPage'])->name('blog.page');
//show blog post by category
Route::get('/blog/category/{slug}', [FrontendController::class, 'showBlogPostByCategory'])->name('blog.category.post');
Route::get('/blog/tag/{slug}', [FrontendController::class, 'showBlogPostByTag'])->name('blog.tag.post');
Route::get('/blog/single/{slug}', [FrontendController::class, 'showSingleBlogPost'])->name('blog.single.post');;
