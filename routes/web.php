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

Route::get('/', function () {return view('birthdays.welcome');});
Route::get('birthdays' , 'BirthdayController@index')->name('birthdays.index');
Route::post('birthdays' , 'BirthdayController@store')->name('birthdays.store');
Route::get('birthdays/{id}' , 'BirthdayController@show')->name('birthdays.show');
Route::get('birthdays/{id}/edit' , 'BirthdayController@edit')->name('birthdays.edit');
Route::patch('birthdays/update/{id}', 'BirthdayController@update')->name('birthdays.update');
Route::get('birthdays/delete/{id}' , 'BirthdayController@destroy')->name('birthdays.destroy');


Auth::routes();
Route::get('/home', 'Controller@index')->name('index');
