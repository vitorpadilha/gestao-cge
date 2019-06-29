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

Route::middleware(['auth'])->group(function () {
    Route::get('grupos/mantem',["uses"=>"GrupoUsuario\MantemGrupoUsuarioController@exibirForm"])->name('grupos.mantem');
    Route::get('grupos/listar',["uses"=>"GrupoUsuario\MantemGrupoUsuarioController@listar"])->name('grupos.list');
    Route::get('usuarios/mantem',["uses"=>"Usuario\MantemUsuarioController@exibirForm"])->name('usuarios.mantem');
    Route::get('usuarios/listar',["uses"=>"Usuario\MantemUsuarioController@listar"])->name('usuarios.list');
    Route::post('usuarios/deletar', ["uses"=>"Usuario\MantemUsuarioController@deletar"])->name('usuarios.deleta');
    
    Route::post('usuarios/cadastra', ["uses"=>"Usuario\MantemUsuarioController@cadastrar"])->name('usuarios.cadastra');
    
    Route::post('grupos/cadastra', ["uses"=>"GrupoUsuario\MantemGrupoUsuarioController@cadastrar"])->name('grupos.cadastra');
    Route::get('/admin/home',["uses"=>"HomeController@exibirForm"])->name('admin.home');
    
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',["uses"=>"WelcomeController@index"])->name('home');

    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
