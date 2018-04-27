<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;

use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\ContaspagarFormRequest;
use Illuminate\Support\Collection;
use Response;
use DB;


class ContaspagarController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
		
	}

	public function index(Request $request){

		if($request){
			$query=trim($request->get('searchText'));
			$contas=DB::table('contaspagar as c')
			->join('compra as com', 'com.idcompra', '=', 
				'c.idcompra')
			->join('fornecedor as f', 'f.idfornecedor', '=', 
				'c.idfornecedor')

			->select('com.idcompra','f.idfornecedor','com.numeroDeParcelas','c.idcontasp', 'c.data','c.descricao','c.valor')

			->select('com.idcompra','f.idfornecedor','com.numeroDeParcelas','c.idcontasp', 'c.data','c.descricao','c.valor')

			

			->where('c.idcontasp', 'LIKE', '%'.$query.'%','or','is null')
			
			
			->orderBy('c.idcontasp','desc')

			->groupBy ('com.idcompra','f.idfornecedor','com.numeroDeParcelas','c.idcontasp', 'c.data','c.descricao','c.valor')

			->paginate(7);
			return view('contaspagar.index', [
				"contaspagar"=>$contas, "searchText"=>$query
			]);
		}
	}

	

	public function create(){

		$compra=DB::table('compra')
		->get();
		$fornecedor=DB::table('fornecedor')
		->get();
		return view("contaspagar.create", ["compra"=>
			$compra],["fornecedor"=>$fornecedor]);


	}

	public function store(ContaspagarFormRequest $request){
		$contas = new Contaspagar;		
		$contas->data=$request->get('data');
		$contas->valor=$request->get('valor');
		$contas->descricao=$request->get('descricao');
		$contas->idfornecedor=$request->get('idfornecedor');
		$contas->idcompra=$request->get('idcompra');
		$contas->parcela=$request->get('parcela');
		
		$contas->save();
		return Redirect::to('contaspagar');


	}

	public function show($id){




		$contaspagar=DB::table('contaspagar as cp')
		->join('parcelapagar as parc', 'parc.idcontasp','=','cp.idcontasp')
		->join('compra as c ','c.idcompra','=','cp.idcompra')

		->select('cp.idcontasp','cp.data','cp.valor','parc.idparcela','parc.dataVencimento','parc.idcontasp','cp.descricao','cp.idcompra','cp.parcela')
		->where('cp.idcontasp', '=',$id)
		->groupBy('cp.idcontasp','cp.data','cp.valor','parc.idparcela','parc.dataVencimento','parc.idcontasp','cp.descricao','cp.idcompra','cp.parcela')
		->first();

		

		$parcelapagar=DB::table('parcelapagar as parc')

		->join('contaspagar as cp', 'cp.idcontasp','=','parc.idcontasp')
		->select('parc.idparcela','parc.dataVencimento','valorParcela','parc.idcontasp')
		->where('cp.idcontasp', '=',$id)
		->get();





		return view("contaspagar.show", 
			["contaspagar"=>$contaspagar, "parcelapagar"=>$parcelapagar]);
	}

	public function edit($id){

		$contas = Contaspagar::findOrFail($id);
		$compra = DB::table('compra')
		->get();
		$fornecedor = DB::table('fornecedor')
		->get();


		return view("contaspagar.edit", ["compra"=>
			$compra],["fornecedor"=>$fornecedor]);
	}

	public function update(ContaspagarFormRequest $request, $id){
		$contas=contaspagar::findOrFail($id);
		$contas->idcompra=$request->get('idcompra');
		$contas->idfornecedor=$request->get('idfornecedor');
		$contas->data=$request->get('data');
		$contas->valor=$request->get('valor');
		$contas->descricao=$request->get('descricao');
		$contas->update();
		return Redirect::to('contaspagar');
	}

	public function destroy($id){
		$contas=contaspagar::findOrFail($id);
		delete('contas');
		$contas->update();
		return Redirect::to('contaspagar');
	}



}

