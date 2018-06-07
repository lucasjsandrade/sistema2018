<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\compra;
use sistemaLaravel\itensc;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\CompraFormRequest;
use sistemaLaravel\Http\requests\ContaspagarFormRequest;
use Carbon\Carbon;
use Response;
use DB;

class CompraController extends Controller
{

	public function __construct(){
		$this->middleware('auth');


	}



	public function index(Request $request){

		if($request){
			$query=trim($request->get('searchText'));
			$compra=DB::table('compra as c')

			->join('itensc as itens','itens.idcompra', '=', 'c.idcompra')

			->join('produto as pro','itens.idproduto',  '=','pro.idproduto')

			->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')

			->join('funcionario as func', 'func.idfuncionario', '=', 'c.idfuncionario')

			->select('c.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia', 'c.dataCompra', 'c.status','c.totalCompra')

			->orderBy('c.idcompra', 'desc')

			->groupBy('c.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia', 'c.dataCompra', 'c.status','c.totalCompra')

			
			->where('c.status', '=', 'Fechado')  
			->where('c.idcompra','LIKE', '%'.$query.'%') 	

			->paginate(7);

			return view('compra.compra.index', [
				"compra"=>$compra, "searchText"=>$query
			]);
		}
	}

	public function create(){

		$fornecedor=DB::table('fornecedor')
		->where('status','=','Ativo')
		->get();

		$funcionario=DB::table('funcionario')
		->where('status','=','Ativo')
		->get();



		$produto=DB::table('produto as pro')
		->select(DB::raw('CONCAT(pro.idproduto, " - ", pro.modelo) as produto'), 'pro.idproduto')
		->where('status','=','Ativo')
		->get();

		return view("compra.compra.create",
			["fornecedor"=>$fornecedor, "funcionario"=>$funcionario, "produto"=>$produto]);
	}



	public function store(CompraFormRequest $request){

		try{

			DB::beginTransaction();

			$compra = new compra;
			$compra->idfornecedor=$request->get('idfornecedor');
			$compra->idfuncionario=$request->get('idfuncionario');
			$compra->condicaoPagamento=$request->get('condicaoPagamento');


			$compra->totalCompra=$request->get('totalCompra');
			$mytime = Carbon::now('America/Sao_Paulo'); 
			$compra->dataCompra=$mytime->toDateTimeString();

			$compra->formaPagamento=$request->get('formaPagamento');
			$compra->status='Aberto';
			$compra->numeroDeParcelas=$request->get('numeroDeParcelas');

			$compra->save();

			$contas = new Contaspagar;

			$contas->idcompra=$compra->idcompra;
			$contas->idfornecedor=$request->get('idfornecedor');
			$contas->data=$mytime->toDateTimeString();
			$contas->valor=$compra->totalCompra;
			$contas->descricao='Gerado Pela compra!';;
			$contas->parcela=$compra->numeroDeParcelas;



			$contas->save();

			
			
			$cont =0;

			$dataParcela = $compra->dataCompra;

			while($cont < ($compra->numeroDeParcelas)){

				$teste = DB::table('contaspagar')->max('idcontasp');
				$parcela = new ParcelaPagar();
				$parcela->idcontasp=$teste;
				$parcela->valorParcela=($compra->totalCompra/$compra->numeroDeParcelas);
				
				

				$dataParcela = date("Y-m-d",strtotime("+1 month",strtotime($dataParcela)));
				$parcela->dataVencimento = $dataParcela;
           // [...] Gravar a parcela
				




				$cont=$cont+1;


				$parcela->save();

			}






			$idproduto=$request->get('idproduto');
			$quantidade=$request->get('quantidade');
			$valorUnitario=$request->get('valorUnitario');
			//$totalCompra=$request->get('totalCompra');
			$compra->numeroDeParcelas;









			$cont= 0;
			while($cont < count($idproduto)){

				$itens = new itensc();
				$itens->idcompra=$compra->idcompra;
				$itens->idproduto=$idproduto[$cont];
				$itens->quantidade=$quantidade[$cont];
				$itens->valorUnitario=$valorUnitario[$cont];
				$itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont]);
				$itens->save();
				$cont=$cont+1;





			}

			DB::commit();

			return Redirect::to('compra');



		}catch(\Exception $e){
			echo "<script>alert('Erro ao salvar no BD!');</script>";

			DB::rollback();

			echo "<script>window.location = 'compra';</script>"; 

		}

	}







	public function show($id){

		$compra=DB::table('compra as c')
		->join('itensc as i', 'i.idcompra','=','c.idcompra')
		->join('produto as pro', 'pro.idproduto','=','i.idproduto')
		->join('funcionario as fun', 'fun.idfuncionario','=','c.idfuncionario')
		->join('fornecedor as f', 'f.idfornecedor', '=', 
			'c.idfornecedor')

		->select('fun.idfuncionario','f.idfornecedor','c.dataCompra','fun.nomeFuncionario','f.razaoSocial','c.status','pro.modelo','pro.unidadeMedida','c.formaPagamento','c.condicaoPagamento','c.idcompra','i.quantidade','i.valorUnitario','i.valorTotal','c.numeroDeParcelas',DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
		->where('c.idcompra', '=', $id )


		->groupBy('i.iditensc','fun.idfuncionario','f.idfornecedor','c.dataCompra','fun.nomeFuncionario','f.razaoSocial','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','c.status','c.formaPagamento','c.condicaoPagamento','c.idcompra','c.numeroDeParcelas')
		->first();  

		$itens=DB::table('itensc as i')

		->join('produto as pro', 'pro.idproduto','=','i.idproduto')
		->join('compra as c', 'i.idcompra','=','c.idcompra')
		->select('i.iditensc','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','c.formaPagamento','c.condicaoPagamento','c.idcompra','c.totalCompra')
		->where('c.idcompra', '=',$id)
		->get();







		return view("compra.compra.show", 
			["compra"=>$compra, "itens"=>$itens]);

	}



	public function destroy($id){
		$compra=compra::findOrFail($id);
		$compra->status='Cancelado'; 
		$compra->update();
		return Redirect::to('compra');   	
	}





}
