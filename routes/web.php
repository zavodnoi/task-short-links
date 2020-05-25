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
Route::get('/', 'ShortLinkController@index')->name('index');
Route::post('/', 'ShortLinkController@store')->name('store');
Route::get('/{shortLink}', 'ShortLinkController@redirect')->name('redirect');
Route::get('/{shortLink}/statistic', 'ShortLinkController@statistic')->name('statistic');

