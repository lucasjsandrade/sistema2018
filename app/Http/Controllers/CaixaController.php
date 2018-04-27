<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Caixa;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CaixaFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CaixaController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Request $request){

		if($request){
			$query=trim($request->get('searchText'));
			$caixa=DB::table('caixa as c')
			->join('movimentacaoCaixa as mov', 'mov.idmovimentacaoCaixa', '=', 
				'c.idmovimentacaoCaixa')
			->select('c.idcaixa', 'c.data', 
				'c.saldoInicial','c.saldoFinal','c.diferenca','c.situacao','mov.descricao','mov.data','mov.tipoMovimentacao','mov.valor')
			->where('c.idcaixa', 'LIKE', '%'.$query.'%') 
			

			->orderBy('idcaixa','desc')
			->paginate(10);
			return view('caixa.index', [
				"caixa"=>$caixa, "searchText"=>$query
			]);
		}
	}

	public function create(){

		$caixa=DB::table('caixa')
		->get();
		$marca=DB::table('marca')
		->where('status', '=', 'ativo')
		->get();
		return view("estoque.produto.create", ["categorias"=>
			$categorias],["marca"=>
			$marca]);


	}

	public function store(ProdutoFormRequest $request){

		$produto = new Produto;
		$produto->idcategoria=$request->get('idcategoria');
		$produto->codigo=$request->get('codigo');
		$produto->modelo=$request->get('modelo');
		$produto->cor=$request->get('cor');
		$produto->material=$request->get('material');
		$produto->unidadeMedida=$request->get('unidadeMedida');
		$produto->quantidade=0;
		$produto->preco=0;
		$produto->custo=0;
		$produto->status='Ativo';
		$mytime = Carbon::now('America/Sao_Paulo'); 
		$produto->dataCadastro=$mytime->toDateTimeString();



		$produto->save();
		return Redirect::to('estoque/produto');


	}


	public function show($id){
		return view("estoque.produto.show", 
			["produto"=>Produto::findOrFail($id)]);
	}

	public function edit($id){

		$produto = Produto::findOrFail($id);
		$categorias = DB::table('categoria')
		->where('status', '=','ativo')->get();
		$marca = DB::table('marca')
		->where('status', '=','Ativo')->get();

		return view("estoque.produto.edit", 
			["produto"=>$produto, "categorias"=>$categorias,"marca"=>$marca]);
	}

	public function update(ProdutoFormRequest $request, $id){
		$produto=Produto::findOrFail($id);
		$produto->idcategoria=$request->get('idcategoria');
		$produto->codigo=$request->get('codigo');
		$produto->cor=$request->get('cor');
		$produto->material=$request->get('material');
		$produto->unidadeMedida=$request->get('unidadeMedida');
		$produto->status=$request->get('status');
		$produto->preco=$request->get('preco');
		$produto->modelo=$request->get('modelo');
    //$produto->custo=$request->get('custo');


		$produto->update();


		return Redirect::to('estoque/produto');
	}

	public function destroy($id){
		$produto=Produto::findOrFail($id);
		$produto->status='Inativo';
		$produto->update();
		return Redirect::to('estoque/produto');
	}
}