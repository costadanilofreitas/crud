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
    return view('index');
});

Route::prefix('produtos')->group(function(){
    Route::get('/', 'ProdutoController@index')->name('produto.index');
    Route::get('/new', 'ProdutoController@create')->name('produto.create');
    Route::post('/store','ProdutoController@store')->name('produto.store');
    Route::get('/edit/{produto}', 'ProdutoController@edit')->name('produto.edit');
    Route::post('/update/{produto}', 'ProdutoController@update')->name('produto.update');
    Route::get('/destroy/{produto}', 'ProdutoController@destroy')->name('produto.destroy');
});

Route::prefix('estruturas')->group(function(){
    Route::get('/', 'EstruturaController@index')->name('estrutura.index');
    Route::get('/new', 'EstruturaController@create')->name('estrutura.create');
    Route::post('/store','EstruturaController@store')->name('estrutura.store');
    Route::get('/edit/{estrutura}', 'EstruturaController@edit')->name('estrutura.edit');
    Route::post('/update/{estrutura}', 'EstruturaController@update')->name('estrutura.update');
    Route::get('/destroy/{estrutura}', 'EstruturaController@destroy')->name('estrutura.destroy');
});
