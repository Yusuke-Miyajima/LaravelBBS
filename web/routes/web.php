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
Route::post('/index', 'Index\IndexController@confirm');
Route::get('/edit/{id}', 'Edit\EditController@edit');
Route::get('/confirm', 'Confirm\ConfirmController@confirm');
Route::get('/complete', 'Complete\CompleteController@complete');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
