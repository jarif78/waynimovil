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
Route::post('/import_file', 'ImportController@file')->name('import_file');
Route::get('/import_datatable', 'ImportController@datatable')->name('import_datatable');
Route::get('/import_datatable_entities', 'ImportController@datatable_entities')->name('import_datatable_entities');
Route::get('/import_datatable_debtors', 'ImportController@datatable_debtors')->name('import_datatable_debtors');