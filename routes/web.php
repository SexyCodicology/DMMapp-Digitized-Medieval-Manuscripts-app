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

/* SECTION Routes accessible only by admins */
Route::get('/admin', 'LibraryController@admin')->name('admin')->middleware('auth');
Route::get('/record/new', 'LibraryController@newLibrary')->name('new_library')->middleware('auth');
Route::post('/record/new', 'LibraryController@newLibrary')->name('create_library')->middleware('auth');
Route::get('/record/edit/{library_id}', 'LibraryController@modify')->name('modify_library')->middleware('auth');
Route::post('/record/edit/{library_id}', 'LibraryController@modify')->name('update_library')->middleware('auth');
Route::get('/searchadmin', 'LibraryController@searchadmin')->middleware('auth');
Route::delete('/record/delete/{library_id}', 'LibraryController@destroy')->name('delete_library')->middleware('auth');

/* SECTION Public pages */
Route::get('/data', 'LibraryController@index')->name('libraries');
Route::get('/', 'LibraryController@map')->name('map');
Route::get('/record/{library_id}', 'LibraryController@show')->name('show_library');
Route::get('/search', 'LibraryController@search');
Route::get('/loggedin', 'Auth\LoggedInController@index')->name('loggedin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');;

Auth::routes();