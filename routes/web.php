<?php

use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('auth/login');
});

Route::resource('estoque/categoria', 'CategoriaController');
Route::resource('estoque/produto', 'ProdutoController');
Route::resource('estoque/marca', 'MarcaController');
Route::resource('regiao/pais',   'PaisController');
Route::resource('regiao/estado', 'EstadoController');
Route::resource('regiao/cidade', 'CidadeController');
Route::resource('pessoa/fornecedor', 'fornecedorController');
Route::resource('pessoa/cliente', 'ClienteController');
Route::resource('pessoa/funcionario', 'FuncionarioController');
Route::resource('venda/agendamento', 'agendamentoController');
Route::resource('venda/orcamento', 'orcamentoController');
Route::resource('compra/pedido', 'PedidoController');
Route::resource('compra/compra', 'CompraController');
Route::resource('venda/venda', 'VendaController');
Route::resource('contaspagar', 'ContaspagarController');
Route::resource('contasreceber', 'ContasreceberController');
Route::resource('pagamento', 'PagamentoController');
Route::resource('recebimento', 'RecebimentoController');
Route::resource('parcelapagar', 'ParcelapagarController');
Route::resource('parcelareceber', 'ParcelaReceberController');
Route::resource('parcelapagarget', 'ParcelapagarController@get');
Route::resource('parcelareceberget', 'ParcelareceberController@get');
Route::resource('caixa', 'CaixaController');
Route::get('/close', 'CaixaController@close');
Route::POST('/consulta', 'PagamentoController@consulta');
Route::resource('sobre', 'SobreController');
Route::resource('layouts', 'desenvolvimentoController');
Route::resource('seguranca/usuario', 'usuarioController');
Route::resource('sangria', 'sangriaController');
Route::auth  ();
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/{slug?}', 'HomeController@index' );

//Route::get('/pagamento/create',function(){
//    $contaspagar = Contaspagar::all();
  //  return View::make('/pagamento/create')->with('contaspagar', $contaspagar);
//});


