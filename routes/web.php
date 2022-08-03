<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Admin Part
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Amin routes
        Route::resource('admins', 'Admin\AdminController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('users', 'Admin\UserController');
        Route::post('users/reset-credits', 'Admin\UserController@resetCredits')->name('users.reset-credits');
        Route::post('users/reset-cashes', 'Admin\UserController@resetCashes')->name('users.reset-cashes');
        Route::resource('user_groups', 'Admin\UserGroupController');
        Route::resource('settings', 'Admin\SettingController');
        Route::resource('popups', 'Admin\PopUpController');
        Route::resource('count_downs', 'Admin\CountDownController');
    });

    Route::prefix('user')->group(function () {
        // Amin routes
        Route::resource('profile', 'User\ProfileController');
        Route::resource('notifications', 'User\NotificationController');
        Route::resource('pop_ups', 'User\PopUpController')->only('show');
    });

    // Default
    Route::get('/home', 'HomeController@index')->name('home');
});
