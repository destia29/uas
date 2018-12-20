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

Route::get('/home', 'HomeController@list')->name('home');

Route::post('/login/custom', [
    'uses' => 'controllerLogin@login',
    'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){
  Route::get('/home', 'HomeController@list')->name('home');
  Route::get('/dashboard', 'HomeController@user')->name('dashboard');
  Route::delete('/dashboard/{id}', 'HomeController@destroy')->name('dashboard.hapus');

  Route::get('/post', 'HomeController@post')->name('post');
  Route::post('/post', 'HomeController@prosesPost')->name('prosesPost');

});
