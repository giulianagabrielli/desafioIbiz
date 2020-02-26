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

//importar e exportar dados Excel
Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');

//lista de usuários ativos e inativos
Route::get('/usuarios/ativos', 'UserController@getActiveUsers');
Route::get('/usuarios/inativos', 'UserController@getInactiveUsers');
//atualizar informações de usuários
Route::get('/usuarios/atualizar/{id?}', 'UserController@updateUser');
Route::post('/usuarios/atualizar', 'UserController@updateUser');
//detelar usuário
Route::get('/usuarios/deletar/{id?}', 'UserController@deleteUser');

