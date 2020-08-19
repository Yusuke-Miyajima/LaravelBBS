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

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	return response('', 301)->header('Location', '/top');
});

Route::get('/index', 'Index\IndexController@index');
Route::post('/index', 'Index\IndexController@btn_push');
Route::get('/edit', 'Edit\EditController@edit');
Route::post('/edit', 'Edit\EditController@btn_push');
Route::get('/confirm', 'Confirm\ConfirmController@confirm');
Route::post('/confirm', 'Confirm\ConfirmController@btn_push');
Route::get('/complete', 'Complete\CompleteController@complete');
Route::post('/complete', 'Complete\CompleteController@btn_push');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
