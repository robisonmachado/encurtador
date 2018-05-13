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

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', 'EncurtadorController@index');

Route::group(['middleware' => ['auth', 'auth.unique.user']],function () {
    
    Route::resource('encurtador', 'EncurtadorController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/encurtador/{quantidade}/{pagina}', 'EncurtadorController@index');

});


Auth::routes();

Route::get('/{alias}', 'EncurtadorController@redirect');