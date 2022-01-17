<?php

use Illuminate\Support\Facades\Route;
use app\Role;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::resource('basic', BasicController::class);
});


Route::resource('member', MemberController::class);
Route::resource('paket', PaketController::class);
Route::resource('transaksi', TransaksiController::class);
Route::post('export', 'TransaksiController@export');
