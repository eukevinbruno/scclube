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

// Painel (ADMIN)
Route::group(['prefix' => 'painel', 'namespace' => 'Painel'], function()
{
  Route::get('/', function () {
    return view('painel/index');
  });  
  
  Route::post('/login', 'LoginController@login');
  Route::get('/dashboard', 'DashboardController@index');
  
  Route::get('/usuarios', 'UsuarioController@index');
  Route::get('/usuario/novo', 'UsuarioController@novo');
  Route::get('/usuario/editar/{id}', 'UsuarioController@editar');
  Route::post('/usuario/salvar', 'UsuarioController@salvar'); 
  
  Route::get('/sistema', 'ConfiguracaoController@index');
  Route::post('/sistema/salvar', 'ConfiguracaoController@salvar');

  Route::get('/sliders', 'SliderController@index');
  Route::get('/slider/editar/{id}', 'SliderController@editar');
  Route::post('/slider/salvar', 'SliderController@salvar');
  Route::get('/slider/excluir/{id}', 'SliderController@excluir');
  
  Route::get('/videos', 'VideoController@index');
  Route::get('/video/novo', 'VideoController@novo');
  Route::get('/video/editar/{id}', 'VideoController@editar');
  Route::post('/video/salvar', 'VideoController@salvar'); 
  Route::get('/video/excluir/{id}', 'VideoController@excluir');
  
  Route::get('/depoimentos', 'DepoimentoController@index');
  Route::get('/depoimento/novo', 'DepoimentoController@novo');
  Route::get('/depoimento/editar/{id}', 'DepoimentoController@editar');
  Route::post('/depoimento/salvar', 'DepoimentoController@salvar'); 
  Route::get('/depoimento/excluir/{id}', 'DepoimentoController@excluir');

  Route::get('/faq', 'FaqController@index');
  Route::get('/faq/novo', 'FaqController@novo');
  Route::get('/faq/editar/{id}', 'FaqController@editar');
  Route::post('/faq/salvar', 'FaqController@salvar'); 
  Route::get('/faq/excluir/{id}', 'FaqController@excluir');
  
  Route::get('/noticias', 'NoticiaController@index');
  Route::get('/noticia/novo', 'NoticiaController@novo');
  Route::get('/noticia/editar/{id}', 'NoticiaController@editar');
  Route::post('/noticia/salvar', 'NoticiaController@salvar'); 
  Route::get('/noticia/excluir/{id}', 'NoticiaController@excluir');
  
  Route::get('/paginas', 'PaginaController@index');
  Route::get('/pagina/novo', 'PaginaController@novo');
  Route::get('/pagina/editar/{id}', 'PaginaController@editar');
  Route::post('/pagina/salvar', 'PaginaController@salvar'); 
  Route::get('/pagina/excluir/{id}', 'PaginaController@excluir');
  
  Route::get('/sair', 'UsuarioController@sair');
  
});



// (Site)
Route::group(['namespace' => 'Site'], function()
{

  
  Route::get('/', 'HomeController@index');
  Route::get('/inicio', 'HomeController@index');
  Route::get('/contato', 'ContatoController@index');
  Route::get('/content/{id}', 'PaginaController@detalhe');
  Route::get('/noticia/{id}', 'NoticiaController@detalhe');
  Route::get('/faq', 'FaqController@detalhe');
 

  
});