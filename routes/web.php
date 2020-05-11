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

Route::get('/login', 'Web\WelcomeController@index')->name('login');
Route::get('/', 'Web\WelcomeController@index')->name('home');

Auth::routes();

Route::get('{path}', 'Web\WelcomeController@index')->where('path', '([A-z\d\-/_.]+)?');
