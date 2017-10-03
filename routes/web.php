<?php

// Rotas do site
Route::view('/', 'upload')->name('home');
Route::view('sobre', 'sobre');
Route::view('politica', 'politica');
Route::get('github', function () {
    return redirect()->to('https://github.com/fabiojaniolima/WebUpload');
});

// Rota para upload de arquivos
Route::post('/upload', 'Site\UploadController@upload');

Auth::routes();

// Rotas do painel adminsitrativo
Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {

    Route::get('/', 'Painel\HomeController@index');
    
    Route::get('/arquivos', 'Painel\ArquivoController@index');
    Route::get('/arquivos/download/{id}', 'Painel\ArquivoController@download');
    Route::get('/arquivos/excluir/{id}', 'Painel\ArquivoController@excluir');
    
    Route::get('/tags', 'Painel\TagController@index');
    Route::get('/tags/cad_edit/{id?}', 'Painel\TagController@cad_edit');
    Route::get('/tags/excluir/{id}', 'Painel\TagController@excluir');
    Route::post('/tags/criar', 'Painel\TagController@criar');
    Route::post('/tags/atualizar/{id}', 'Painel\TagController@atualizar');
});