<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::get('/penginput','PenginputController@index')->name('penginput');
Route::get('/penginput/tambah','PenginputController@create');
Route::post('/penginput/upload','PenginputController@store')->name('penginput.upload');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/admin/laporan','PengecekController@index')->name('admin.cek');
Route::get('/admin/download/{id}','PengecekController@download');
Route::get('admin/edit/{id}','PengecekController@edit');
Route::post('admin/update/{id}','PengecekController@update');
Route::get('admin/hapus/{id}','PengecekController@destroy');
Route::get('/uploads/{file}','PengecekController@show');
// Route::get('admin','PengecekController@checkverifikasi');

Route::get('profile','ProfileController@index')->name('profile');
Route::get('/profile/tambah','ProfileController@create');
Route::post('/profile/simpan','ProfileController@store');
Route::get('/profile/edit/{id}','ProfileController@edit');
Route::post('/profile/update/{id}','ProfileController@update');

Route::get('/admin/profile/', 'AdminController@indexProfile')->name('admin.profile');
Route::get('/admin/profile/detail/{id}', 'AdminController@detailProfile');

Route::get('/admin/user','AdminController@indexUser')->name('admin.user');
Route::get('/admin/user/tambah','AdminController@formAddUser')->name('admin.user.add');
Route::post('/admin/user/simpan','AdminController@addUser')->name('admin.user.store');
Route::get('/admin/user/hapus/{id}','AdminController@hapusUser');
Route::get('/admin/user/edit/{id}','AdminController@editUser');
Route::post('/admin/user/update/{id}','AdminController@updateUser');