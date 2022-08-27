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
        Route::resource('flags', 'Admin\FlagController');
        Route::resource('polls', 'Admin\PollController');
        Route::resource('withdrawal_requests', 'Admin\WithdrawalController');
        Route::get('change_status/{poll}', 'Admin\PollController@changeStatus')->name('polls.changeStatus');
    });

    Route::prefix('user')->group(function () {
        // Amin routes
        Route::resource('profile', 'User\ProfileController');
        Route::resource('notifications', 'User\NotificationController');
        Route::resource('withdrawals', 'User\WithdrawalController');
        Route::resource('pop_ups', 'User\PopUpController')->only('show');
        Route::post('count_down', 'User\CountDownController@showText')->name('show_count_down');
        Route::get('poll_request/{id}', 'User\PollController@pollRequest')->name('pollRequest');
    });

    // Default
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('telegram/login/{token}','TelegramController@login')->name('telegram.login');
});

Route::resource('test','TestController');
Route::get('telegram/webhook','TelegramController@webhook');
Route::resource('contact_us','ContactUsController');