<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/api-get', 'apiController@index')->name('api');

//USERS
// Route::get('/user/login', 'api\v1\LoginController@login')->name('user.login.attemp');
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'api\v1\LoginController@login')->name('login');
});

Route::get('/api-get', 'apiController@index')->name('api');
Route::get('/api-jurusan', 'apiController@jurusan')->name('api-jurusan');
Route::get('/api-profile/{id}', 'apiController@profile')->name('api-profile');
Route::post('/api-profile/{id}', 'apiController@ubah')->name('api-profile');
