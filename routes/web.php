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

//usuário logado que não tem nível de acesso para a rota
Route::get('/stop', 'HomeController@stop')->name('stop');

//importar e exportar dados Excel
Route::get('export', 'SpreadsheetController@export')->name('export');
Route::get('planilha', 'SpreadsheetController@importExportView');
Route::post('import', 'SpreadsheetController@import')->name('import');

//rotas de usuários (/login e /register são do pacote ui)
Route::group(['prefix'=>'usuarios'], function(){
    //lista de usuários ativos e inativos
    Route::get('/ativos', 'UserController@getActiveUsers')->middleware('checkuser');
    Route::get('/inativos', 'UserController@getInactiveUsers')->middleware('checkadmin');
    //atualizar informações de usuários
    Route::get('/atualizar/{id?}', 'UserController@updateUser')->middleware('checkadmin');
    Route::post('/atualizar', 'UserController@updateUser');
    //detelar usuário
    Route::get('/deletar/{id?}', 'UserController@deleteUser')->middleware('checkadmin');
    //visualização de níveis de acesso ativos
    Route::get('/admin/ativos', 'UserController@getAdminActive')->middleware('checkadmin');
    Route::get('/gerente/ativos', 'UserController@getManagerActive')->middleware('checkadmin');
    Route::get('/consultor/ativos', 'UserController@getConsultantActive')->middleware('checkadmin');
    //visualização de níveis de acesso inativos
    Route::get('/admin/inativos', 'UserController@getAdminInactive')->middleware('checkadmin');
    Route::get('/gerente/inativos', 'UserController@getManagerInactive')->middleware('checkadmin');
    Route::get('/consultor/inativos', 'UserController@getConsultantInactive')->middleware('checkadmin');
});

//rotas para produtos
Route::group(['prefix'=>'produtos'], function(){
    //lista de produtos ativos e inativos
    Route::get('/ativos', 'ProductController@getActiveProducts')->middleware('checkuser');
    Route::get('/inativos', 'ProductController@getInactiveProducts')->middleware('checkadminmanager');
    //edição de produtos
    Route::get('/atualizar/{id?}', 'ProductController@updateProduct')->middleware('checkadmin');
    Route::post('/atualizar', 'ProductController@updateProduct')->middleware('checkadmin');
    //detelar produto
    Route::get('/deletar/{id?}', 'ProductController@deleteProduct')->middleware('checkadmin');
    //cadastrar produto
    Route::get('/cadastrar', 'ProductController@createProduct')->middleware('checkadminmanager');
    Route::post('/cadastrar', 'ProductController@createProduct');
});
