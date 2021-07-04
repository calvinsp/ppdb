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
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('admin.dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth Admin   
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.attemp');
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

//Admin
Route::group(['middleware'=>'admin', 'prefix'=>'/admin', 'as'=>'admin.'], function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('dashboard');
});