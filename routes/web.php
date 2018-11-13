<?php

use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;

Route::get('/', function () {
	return view('auth/login');
});

Route::resource('estoque/categoria', 'CategoriaController');
Route::resource('estoque/produto', 'ProdutoController');
Route::resource('estoque/produto/pdf', 'ProdutoController@pdf');
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
Route::resource('suprimento', 'suprimentoController');
Route::auth  ();
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/sobre', 'InfoController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/{slug?}', 'HomeController@index' );
Route::get('/pdf/getPDF', 'PDFController@getPDF');
Route::get('/pdf/produtoGetPDF', 'PDFController@ProdutoGetPDF');
Route::get('/pdf/cliente', 'PDFController@ClienteGetPDF');
Route::get('/pdf/fornecedor', 'PDFController@FornecedorGetPDF');
Route::get('/pdf/contasPagar', 'PDFController@ContaspagGetPDF');
Route::get('/pdf/contasReceber', 'PDFController@ContasrecGetPDF');
Route::get('/pdf/compra', 'PDFController@CompraIndex');
Route::post('/pdf/CompraGetPDF', 'PDFController@CompraGetPDF');
Route::get('/pdf/venda', 'PDFController@VendaIndex');
Route::post('/pdf/vendaGetPDF', 'PDFController@VendaGetPDF');
Route::get('/pdf/caixa', 'PDFController@CaixaIndex');
Route::post('/pdf/CaixaGetPDF', 'PDFController@CaixaGetPDF');
Route::get('/pdf/pagamento', 'PDFController@PagamentoIndex');
Route::post('/pdf/PagamentoGetPDF', 'PDFController@PagamentoGetPDF');
Route::get('/pdf/recebimento', 'PDFController@RecebimentoIndex');
Route::post('/pdf/RecebimentoGetPDF', 'PDFController@RecebimentoGetPDF');


