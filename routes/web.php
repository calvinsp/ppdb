<?php

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

Route::get('/', function () {
    return view('front.main', ['title' => 'PPDB Website']);
});
Route::get('/cek', function () {
    return view('front.pendaftaran');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth Admin   Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::get('/admin/login', 'Auth\LoginAdminController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginAdminController@login')->name('admin.login.attemp');
Route::POST('/admin/logout', 'Auth\LoginAdminController@logout')->name('admin.logout');
Route::get('/hash','HashController@index');

//Admin
Route::group(['middleware'=>'admin', 'prefix'=>'/admin', 'as'=>'admin.'], function(){
    Route::get('/', function(){
        return view('admin.dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    Route::get('/table', function () {
        return view('admin.tabel', ['title' => 'Table']);
    })->name('table');

    Route::get('/jurusan', 'JurusanController@data')->name('jurusan');
    Route::get('/form-jurusan', 'JurusanController@form')->name('form-jurusan');
    Route::post('/tambah', 'JurusanController@insert')->name('tambah');
    Route::post('/destroy/{id}', 'JurusanController@destroy')->name('destroy');
    Route::patch('/edit/{id}', 'JurusanController@update')->name('edit');
    Route::get('/pendaftar', 'PendaftarController@index')->name('pendaftar');
    Route::patch('/pendaftar-update{id}', 'PendaftarController@update')->name('pendaftar-update');

});

// User
Route::group(['middleware' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
    Route::post('/insert', 'PendaftaranController@insert')->name('insert');
    Route::get('/user', function () {
        return view('front.dashboard');
    })->name('user');
});


