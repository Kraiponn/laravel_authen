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

Route::get('/typefood/delete/{id}', 'TypeFoodController@delete');

Route::get('/typefood/edit/{id}', 'TypeFoodController@edit');

Route::resource('/food', 'FoodController');

Route::get('/food/download/{id}', 'FoodController@download');

Route::get('/food/pdf-report/{id}', 'FoodController@pdfreport');

Route::get('/about', function(){
    return view('about');
});



Auth::routes();

Route::resource('profiles', 'ProfilesController');

Route::resource('typefood', 'TypeFoodController');
Route::get('/typefood/show/{id}', 'TypeFoodController@show');

Route::get('/home', 'HomeController@index')->name('home');

