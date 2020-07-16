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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ReservasController@index');

Route::get('/search','ReservasController@action')->name('search.action');

Route::get('/show','ReservasController@showJSON')->name('json.show');

Route::get('/download','ReservasController@downloadJSON')->name('json.download');