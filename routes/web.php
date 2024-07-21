<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Post\CreateController;
use App\Http\Controllers\Admin\Post\DeleteController;
use App\Http\Controllers\Admin\Post\EditController;
use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\Admin\Post\ShowController;
use App\Http\Controllers\Admin\Post\StoreController;
use App\Http\Controllers\Admin\Post\UpdateController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authenticate')->name('authenticate');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'create_user')->name('create_user');

    Route::post('logout', 'logout')->name('logout')->middleware('unauthenticated.admin');
});

Route::group(['middleware' => 'unauthenticated.admin'], function () {
    Route::get('/home', DashboardController::class)->name('home');
    Route::group(['prefix' => 'posts'], function () {
        Route::get('', IndexController::class)->name('posts.index');
        Route::get('create', CreateController::class)->name('posts.create');
        Route::post('store', StoreController::class)->name('posts.store');
        Route::get('{post}', ShowController::class)->name('posts.show');
        Route::get('{post}/edit', EditController::class)->name('posts.edit');
        Route::patch('{post}/update', UpdateController::class)->name('posts.update');
        Route::delete('{post}', DeleteController::class)->name('posts.delete');
    });
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users.index')->middleware('admin.panel');
        Route::get('{user}', 'show')->name('users.show');
        Route::get('{user}/edit', 'edit')->name('users.edit');
        Route::get('{user}/editPassword', 'editPassword')->name('users.editPassword');
        Route::patch('{user}/update', 'update')->name('users.update');
        Route::patch('{user}/updatePassword', 'updatePassword')->name('users.updatePassword');
    });

});

