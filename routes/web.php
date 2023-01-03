<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentsController;
use App\Http\Controllers\Frontend\FrontendController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'frontIndex']);

Route::prefix('tutorial')->group(function () {

    Route::get('/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
    Route::get('/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);
});

// Route::prefix('comments')->group(function () {
//     Route::post('/delete', [CommentsController::class, 'deleteComment']);
// });

Route::post('comments', [CommentsController::class, 'createComment']);

Route::post('comments/delete', [CommentsController::class, 'deleteComment'])->name('delete.comment');

// Admin panel

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('category')->group(function () {

        Route::get('/', [CategoryController::class, 'categoryIndex'])->name('admin.category');
        Route::get('/add', [CategoryController::class, 'categoryAdd']);
        Route::post('/add', [CategoryController::class, 'categoryCreate'])->name('admin.add_category');
        Route::get('/edit/{category_id}', [CategoryController::class, 'categoryEdit']);
        Route::post('/update/{category_id}', [CategoryController::class, 'categoryUpdate']);
        // Route::get('/delete/{category_id}', [CategoryController::class, 'categoryDelete']);
        Route::post('/delete', [CategoryController::class, 'categoryDelete']);
    });

    Route::prefix('post')->group(function () {

        Route::get('/', [PostController::class, 'postIndex']);
        Route::get('/add', [PostController::class, 'postAdd']);
        Route::post('/add', [PostController::class, 'postCreate']);
        Route::get('/edit/{post_id}', [PostController::class, 'postEdit']);
        Route::post('/update/{post_id}', [PostController::class, 'postUpdate']);
        Route::post('/delete', [PostController::class, 'postDelete']);
    });

    Route::prefix('user')->group(function () {

        Route::get('/', [UserController::class, 'userIndex']);
        Route::get('/edit/{user_id}', [UserController::class, 'userEdit']);
        Route::post('/update/{user_id}', [UserController::class, 'userUpdate']);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'settingsIndex']);
        Route::post('/', [SettingsController::class, 'settingsCreate']);
    });
});
