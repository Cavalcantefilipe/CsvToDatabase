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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get/{nameClient?}/{idClient?}/{deal?}/{idDeal?}/{orderBy?}/{startDate1?}/{endDate1?}', 'Order\OrderController@index')->name('get');
Route::post('/import', 'Import\ImportController@parseImport')->name('import');
Route::post('/filters', 'Order\OrderController@processForm')->name('filters');
Auth::routes();
