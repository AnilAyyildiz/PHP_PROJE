<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_2');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/referance', [App\Http\Controllers\HomeController::class, 'referance'])->name('referance');
Route::post('/sendmessage', [App\Http\Controllers\HomeController::class, 'sendmessage'])->name('sendmessage');
Route::post('/getproduct', [App\Http\Controllers\HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/productlist/{search}', [App\Http\Controllers\HomeController::class, 'productlist'])->name('productlist');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/product/{id}/{slug}', [App\Http\Controllers\HomeController::class, 'content_detail'])->name('product_detail');
Route::get('/category/{id}/{slug}', [App\Http\Controllers\HomeController::class, 'category_content'])->name('category');


//admin
Route::middleware("admin")->prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');

        //Category
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
        Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin_category_store');
        Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::get('/category/show/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');
        Route::get('/category/destroy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_destroy');

        //content routlari
        Route::prefix('content')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('admin_content');
            Route::get('/create', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('admin_content_create');
            Route::post('/store', [App\Http\Controllers\Admin\ContentController::class, 'store'])->name('admin_content_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('admin_content_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin_content_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\ContentController::class, 'show'])->name('admin_content_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('admin_content_destroy');



        });

    //images routlari
    Route::prefix('image')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\Admin\ImageController::class, 'index'])->name('admin_content_image');
        Route::post('/store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_content_image_store');
        Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_content_image_destroy');
    });
    Route::prefix('faq')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('admin_faq');
        Route::get('/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('admin_faq_create');
        Route::post('/store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin_faq_store');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('admin_faq_update');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('admin_faq_edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\FaqController::class, 'show'])->name('admin_faq_show');
        Route::get('/destroy/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('admin_faq_destroy');

    });
    Route::prefix('message')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
        Route::get('/create', [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('admin_message_create');
        Route::post('/store', [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('admin_message_store');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin_message_show');
        Route::get('/destroy/{id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_destroy');



    });
    Route::prefix('review')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin_review');
        Route::get('/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('admin_review_create');
        Route::post('/store', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('admin_review_store');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin_review_update');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('admin_review_edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin_review_show');
        Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin_review_destroy');

    });

    Route::prefix('user')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_user');
        Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_create');
        Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
        Route::post('/role_add/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'role_add'])->name('admin_user_role_add');
        Route::get('/role_edit/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'role_edit'])->name('admin_user_role_edit');
        Route::get('/role_delete/{user_id}/{role_id}', [App\Http\Controllers\Admin\UserController::class, 'role_delete'])->name('admin_user_role_delete');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
        Route::get('/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_destroy');

    });
        Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
        Route::post('/setting/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

    });

//user Routes
Route::middleware("auth")->prefix('user')->namespace("user")->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');
    Route::get('/myreview', [UserController::class, 'myreview'])->name('myreview');
    Route::get('/mycontent', [UserController::class, 'mycontent'])->name('mycontent');
    Route::get('/deletereview/{id}', [UserController::class, 'deletereview'])->name('user_review_destroy');

    Route::prefix('content')->group(function () {
        Route::get('/', [UserController::class, 'mycontent'])->name('user_content');
        Route::get('/image/{id}', [ContentController::class, 'user_content_image'])->name('user_content_image');
        Route::post('/image/store', [ContentController::class, 'user_content_image_store'])->name('user_content_image_store');
        Route::get('/image/destroy/{id}', [ContentController::class, 'user_content_image_destroy'])->name('user_content_image_destroy');
        Route::get('/create', [ContentController::class, 'create'])->name('user_content_create');
        Route::post('/store', [ContentController::class, 'store'])->name('user_content_store');
        Route::post('/update/{id}', [ContentController::class, 'update'])->name('user_content_update');
        Route::get('/edit/{id}', [ContentController::class, 'edit'])->name('user_content_edit');
        Route::get('/show/{id}', [ContentController::class, 'show'])->name('user_content_show');
        Route::get('/destroy/{id}', [ContentController::class, 'destroy'])->name('user_content_destroy');



    });
});

//admin_login
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'login'])->name('admin_login');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout_');
Route::post('/admin/login_check', [App\Http\Controllers\HomeController::class, 'login_check'])->name('login_check');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
