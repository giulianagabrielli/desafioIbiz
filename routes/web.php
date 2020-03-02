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
Route::get('export', 'SpreadsheetController@export')->name('export');
Route::get('planilha', 'SpreadsheetController@importExportView')->middleware('checkuser');
Route::post('import', 'SpreadsheetController@import')->name('import');

//rotas de usuários (/login e /register são do pacote ui)
Route::group(['prefix'=>'usuarios'], function(){
    //cadastro de usuário pelo admin
    Route::get('/cadastrar', 'UserController@registerUser');
    Route::post('/cadastrar', 'UserController@registerUser');
    //lista de usuários ativos e inativos
    Route::get('/ativos', 'UserController@getActiveUsers');
    Route::get('/inativos', 'UserController@getInactiveUsers');
    //atualizar informações de usuários
    Route::get('/atualizar/{id?}', 'UserController@updateUser');
    Route::post('/atualizar', 'UserController@updateUser');
    //detelar usuário
    Route::get('/deletar/{id?}', 'UserController@deleteUser');
    //visualização de níveis de acesso ativos
    Route::get('/admin/ativos', 'UserController@getAdminActive');
    Route::get('/gerente/ativos', 'UserController@getManagerActive');
    Route::get('/consultor/ativos', 'UserController@getConsultantActive');
    //visualização de níveis de acesso inativos
    Route::get('/admin/inativos', 'UserController@getAdminInactive');
    Route::get('/gerente/inativos', 'UserController@getManagerInactive');
    Route::get('/consultor/inativos', 'UserController@getConsultantInactive');
});

//rotas para produtos
Route::group(['prefix'=>'produtos'], function(){
    //lista de produtos ativos e inativos
    Route::get('/ativos', 'ProductController@getActiveProducts');
    Route::get('/inativos', 'ProductController@getInactiveProducts');
    //edição de produtos
    Route::get('/atualizar/{id?}', 'ProductController@updateProduct');
    Route::post('/atualizar', 'ProductController@updateProduct');
    //detelar produto
    Route::get('/deletar/{id?}', 'ProductController@deleteProduct');
    //cadastrar produto
    Route::get('/cadastrar', 'ProductController@createProduct');
    Route::post('/cadastrar', 'ProductController@createProduct');
});

//usuário logado que não tem nível de acesso para a rota
// Route::get('/stop', 'HomeController@stop')->name('stop');