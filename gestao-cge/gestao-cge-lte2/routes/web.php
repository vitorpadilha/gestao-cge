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
    Route::post('grupos/cadastra', ["uses"=>"GrupoUsuario\MantemGrupoUsuarioController@cadastrar"])->name('grupos.cadastra');
    
    Route::get('usuarios/mantem',["uses"=>"Usuario\MantemUsuarioController@exibirForm"])->name('usuarios.mantem');
    Route::get('usuarios/listar',["uses"=>"Usuario\MantemUsuarioController@listar"])->name('usuarios.list');
    Route::get('usuarios/listarJson',["uses"=>"Usuario\MantemUsuarioController@listarJson"])->name('usuarios.list.json');
    Route::post('usuarios/alterar',["uses"=>"Usuario\MantemUsuarioController@alterar"])->name('usuarios.altera');
    Route::post('usuarios/alteraSenha',["uses"=>"Usuario\MantemUsuarioController@alterarSenha"])->name('usuarios.altera.senha');
    Route::post('usuarios/deletar', ["uses"=>"Usuario\MantemUsuarioController@deletar"])->name('usuarios.deleta');
    Route::post('usuarios/cadastra', ["uses"=>"Usuario\MantemUsuarioController@cadastrar"])->name('usuarios.cadastra');
    
    
    Route::get('disciplinas/mantem',["uses"=>"Disciplina\MantemDisciplinaController@exibirForm"])->name('disciplinas.mantem');
    Route::get('disciplinas/listar',["uses"=>"Disciplina\MantemDisciplinaController@listar"])->name('disciplinas.list');
    Route::post('disciplinas/alterar',["uses"=>"Disciplina\MantemDisciplinaController@alterar"])->name('disciplinas.altera');
    Route::post('disciplinas/deletar', ["uses"=>"Disciplina\MantemDisciplinaController@deletar"])->name('disciplinas.deleta');
    Route::post('disciplinas/cadastra', ["uses"=>"Disciplina\MantemDisciplinaController@cadastrar"])->name('disciplinas.cadastra');
    
    Route::get('cursos/mantem',["uses"=>"Curso\MantemCursoController@exibirForm"])->name('cursos.mantem');
    Route::get('cursos/listar',["uses"=>"Curso\MantemCursoController@listar"])->name('cursos.list');
    Route::post('cursos/alterar',["uses"=>"Curso\MantemCursoController@alterar"])->name('cursos.altera');
    Route::post('cursos/deletar', ["uses"=>"Curso\MantemCursoController@deletar"])->name('cursos.deleta');
    Route::post('cursos/cadastra', ["uses"=>"Curso\MantemCursoController@cadastrar"])->name('cursos.cadastra');
    
    Route::get('professores/mantem',["uses"=>"Professor\MantemProfessorController@exibirForm"])->name('professores.mantem');
    Route::get('professores/listar',["uses"=>"Professor\MantemProfessorController@listar"])->name('professores.list');
    Route::post('professores/alterar',["uses"=>"Professor\MantemProfessorController@alterar"])->name('professores.altera');
    Route::post('professores/deletar', ["uses"=>"Professor\MantemProfessorController@deletar"])->name('professores.deleta');
    Route::post('professores/cadastra', ["uses"=>"Professor\MantemProfessorController@cadastrar"])->name('professores.cadastra');
    
    Route::get('areasatuacao/mantem',["uses"=>"AreaAtuacao\MantemAreaAtuacaoController@exibirForm"])->name('areasatuacao.mantem');
    Route::get('areasatuacao/listar',["uses"=>"AreaAtuacao\MantemAreaAtuacaoController@listar"])->name('areasatuacao.list');
    Route::post('areasatuacao/alterar',["uses"=>"AreaAtuacao\MantemAreaAtuacaoController@alterar"])->name('areasatuacao.altera');
    Route::post('areasatuacao/deletar', ["uses"=>"AreaAtuacao\MantemAreaAtuacaoController@deletar"])->name('areasatuacao.deleta');
    Route::post('areasatuacao/cadastra', ["uses"=>"AreaAtuacao\MantemAreaAtuacaoController@cadastrar"])->name('areasatuacao.cadastra');
    
    Route::get('matrizescurriculares/mantem',["uses"=>"MatrizCurricular\MantemMatrizCurricularController@exibirForm"])->name('matrizescurriculares.mantem');
    Route::get('matrizescurriculares/listar',["uses"=>"MatrizCurricular\MantemMatrizCurricularController@listar"])->name('matrizescurriculares.list');
    Route::post('matrizescurriculares/alterar',["uses"=>"MatrizCurricular\MantemMatrizCurricularController@alterar"])->name('matrizescurriculares.altera');
    Route::post('matrizescurriculares/deletar',["uses"=>"MatrizCurricular\MantemMatrizCurricularController@deletar"])->name('matrizescurriculares.deleta');
    Route::post('matrizescurriculares/cadastra',["uses"=>"MatrizCurricular\MantemMatrizCurricularController@cadastrar"])->name('matrizescurriculares.cadastra');
    
    
    
    Route::get('/admin/home',["uses"=>"HomeController@exibirForm"])->name('admin.home');
    
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',["uses"=>"WelcomeController@index"])->name('home');

    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
