<?php

use App\DetailTransaksi;
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now Create something great!
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
    Route::get('basic/create_kasir', 'BasicController@create_kasir')->name('basic.create_kasir')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::post('basic/store_kasir', 'BasicController@store_kasir')->name('basic.store_kasir')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::get('basic/create_owner', 'BasicController@create_owner')->name('basic.create_owner')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::post('basic/store_owner', 'BasicController@store_owner')->name('basic.store_owner')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::resource('basic', BasicController::class)->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::resource('member', MemberController::class)->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::resource('paket', PaketController::class)->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::get('transaksi/export', 'TransaksiController@export')->name('transaksi.export')->middleware('role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR, Role::ROLE_OWNER]));
    Route::get('transaksi/print/{id_transaksi}', 'TransaksiController@print')->name('transaksi.print')->middleware('role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR]));
    Route::post('transaksi/cari', 'TransaksiController@cari')->name('transaksi.cari')->middleware('role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR]));
    Route::get('transaksi/index_owner', 'TransaksiController@index_owner')->name('transaksi.index_owner')->middleware(['role:' . Role::ROLE_OWNER]);
    Route::post('transaksi/cari_owner', 'TransaksiController@cari_owner')->name('transaksi.cari_owner')->middleware(['role:' . Role::ROLE_OWNER]);
    Route::get('transaksi/index_detail/{id_transaksi}', 'TransaksiController@index_detail')->name('transaksi.index_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::get('transaksi/create_detail', 'TransaksiController@create_detail')->name('transaksi.create_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::get('transaksi/edit_detail/{id}', 'TransaksiController@edit_detail')->name('transaksi.edit_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::post('transaksi/store_detail', 'TransaksiController@store_detail')->name('transaksi.store_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::put('transaksi/update_detail/{id}', 'TransaksiController@update_detail')->name('transaksi.update_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::delete('transaksi/destroy_detail/{id}', 'TransaksiController@destroy_detail')->name('transaksi.destroy_detail')->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
    Route::resource('transaksi', TransaksiController::class)->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])]);
});
