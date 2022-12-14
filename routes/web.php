<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;
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

Route::get('', function () {
    return redirect()->route('conversations.create');
});

Route::controller(HomeController::class)->prefix('')->name('')->group(function () {
    Route::get('/message', 'message_form')->name('message_form');
    Route::post('/message', 'send_message')->name('send_message');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/signup', 'signedup')->name('signedup');
});

Route::controller(ConversationController::class)->prefix('conversations')->name('conversations.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{conversation}/giver', 'show_giver')->name('show_giver');
    Route::get('/{conversation}/receiver', 'show_receiver')->name('show_receiver');
});