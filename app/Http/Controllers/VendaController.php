<?php
namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Venda;
use sistemaLaravel\Orcamento;
use sistemaLaravel\Itensv;
use sistemaLaravel\Contasreceber;
use sistemaLaravel\Parcelareceber;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\VendaFormRequest;
use sistemaLaravel\Http\requests\orcamentoFormRequest;
use sistemaLaravel\Http\requests\ContasreceberFormRequest;
use Carbon\Carbon;
use Response;
use DB;
use Illuminate\Support\Collection;







class VendaController extends Controller
{
	public function __construct(){
		$this->middleware('auth');

	}

	public function index(Request $request){

		if($request){
			$query=trim($request->get('searchText'));
			$venda=DB::table('venda as v')	

			->join('funcionario as func', 'func.idfuncionario', '=', 'v.idfuncionario')
			->join('cliente as cli', 'cli.idcliente', '=', 'v.idcliente')
			->join('itensv as i', 'i.idvenda', '=', 'v.idvenda')

			->select('v.idvenda','v.dataVenda', 'v.status','v.valorTotal','func.idfuncionario','cli.idcliente','v.valorTotal')
			->where('v.idvenda','LIKE', '%'.$query.'%') 
			->groupBy('v.idvenda','v.dataVenda', 'v.status','v.valorTotal','func.idfuncionario','cli.idcliente','i.valorTotal')	
			->orderBy('v.idvenda', 'desc')
			
			->paginate(7);


			return view('venda/venda.index', [
				"venda"=>$venda, "searchText"=>$query
			]);
		}
	}


	

	public function create(){

		$funcionario=DB::table('funcionario')
		->where('status','=','Ativo')
		->get();
		$cliente=DB::table('cliente')		 
		->where('status','=','Ativo')
		->get();
		$produto=DB::table('produto as pro')
		
		->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'),'pro.idproduto', 'pro.quantidade','pro.preco')

		->where('status','=','Ativo')
		->where('pro.quantidade', '>', '0')
		->groupBy('produto', 'pro.idproduto', 'pro.quantidade','pro.preco')
		->get();

		

		return view("venda.venda.create",
			["produto"=>$produto,"funcionario"=>$funcionario, "cliente"=>$cliente]);
	}




	public function store(VendaFormRequest $request){

		try{

			DB::beginTransaction();

			$venda = new venda;
			$mytime = Carbon::now('America/Sao_Paulo'); 
			$venda->dataVenda=$mytime->toDateTimeString();
			$venda->valorTotal=$request->get('valorTotal');
			$venda->idcliente=$request->get('idcliente');			
			$venda->idfuncionario=$request->get('idfuncionario');
			$venda->condicaoPagamento=$request->get('condicaoPagamento');
			$venda->formaPagamento=$request->get('formaPagamento');
			$venda->valorTotal=$request->get('valorTotal');


			$venda->status='Fechada';
			$venda->numeroDeParcelas=$request->get('numeroDeParcelas');
			$venda->origemVenda=$request->get('origemVenda');




			$venda->save();




			$contas = new Contasreceber;

			$contas->idvenda=$venda->idvenda;
			$contas->idcliente=$request->get('idcliente');
			$contas->data=$mytime->toDateTimeString();
			$contas->valor=$venda->valorTotal;
			$contas->descricao='Gerado Pela Venda!';;
			$contas->parcela=$venda->numeroDeParcelas;



			$contas->save(); 







			$cont =0;

			$dataParcela = $venda->dataVenda;

			while($cont < ($venda->numeroDeParcelas)){

				$numero = DB::table('Contasreceber')->max('idcontasr');
				$parcela = new ParcelaReceber();
				$parcela->idcontasr=$numero;
				$parcela->valorParcela=($venda->valorTotal/$venda->numeroDeParcelas);



				$dataParcela = date("Y-m-d",strtotime("+1 month",strtotime($dataParcela)));
				$parcela->dataVencimento = $dataParcela;

				$cont=$cont+1;


				$parcela->save();

			}








			$idproduto=$request->get('idproduto');
			$quantidade=$request->get('quantidade');
			$valorUnitario=$request->get('valorUnitario');
			$desconto=$request->get('desconto');


			

			$cont= 0;
			while($cont < count($idproduto)){

				$itens = new Itensv();
				$itens->idvenda=$venda->idvenda;
				$itens->idproduto=$idproduto[$cont];
				$itens->quantidade=$quantidade[$cont];
				$itens->desconto=$desconto[$cont];
				$itens->status='Venda';

				$itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont]);



				$itens->save();
				$cont=$cont+1;







			}


			DB::commit();

			return Redirect::to('/venda/venda');



		}catch(\Exception $e){
			echo "<script>alert('Erro ao salvar no BD!');</script>";

			DB::rollback();

			echo "<script>window.location = '/venda/venda';</script>"; 

		}

	}
	

	public function update(VendaFormRequest $request, $id){
		try{
			DB::beginTransaction();

			$venda=Venda::findOrFail($id);
			$mytime = Carbon::now('America/Sao_Paulo'); 
			$venda->dataVenda=$mytime->toDateTimeString();
			$venda->idcliente=$request->get('idcliente');     
			$venda->idfuncionario=$request->get('idfuncionario'); 
			$venda->status='Aberta';
			$venda->origemVenda='Orçamento'; 

			$venda->update();

			$venda = Venda::findOrFail($id);

			$usuario = DB::table('itensv')->where('idvenda', '=', $id)->delete();


			$produto   =$request->get('idproduto');
			$idvenda      =$request->get('idvenda');   
  $quantidade      =$request->get('quantidade');   //chegando array ok
  $desconto      =$request->get('desconto');   //chegando array ok
  $maodeobra      =$request->get('maodeobra');   //chegando array ok
  $valorUnitario      =$request->get('valorUnitario');   //chegando array ok
  


  


  $cont = 0;
  while($cont < count($desconto)){
  	$itens = new Itensv();
  	$itens->idvenda=$orcamento->idvenda;
  	$itens->idproduto=$produto[$cont];
  	$itens->desconto=$orcamento->desconto[$cont];    
  	$itens->quantidade=$quantidade[$cont];
  	$itens->desconto=$desconto[$cont];
  	$itens->maodeobra=$maodeobra[$cont];
  	$itens->valorUnitario=$valorUnitario[$cont];
  	$itens->status='orcamento';
  	$itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont])+$maodeobra[$cont]-$desconto[$cont];;

  	$itens->save();
  	$cont=$cont+1;

  }
  DB::commit();

}catch(Exception $e){
	DB::rollback();
}

return Redirect::to('venda/venda');
}



public function show($id){

	$venda=DB::table('venda as v')
	->join('itensv as i', 'i.idvenda','=','v.idvenda')
	->join('produto as pro', 'pro.idproduto','=','i.idproduto')
	->join('funcionario as fun', 'fun.idfuncionario','=','v.idfuncionario')
	->join('cliente as cli', 'cli.idcliente', '=', 
		'v.idcliente')

	->select('fun.idfuncionario','cli.idcliente','cli.nomeCliente','v.dataVenda','fun.nomeFuncionario','fun.nomeFuncionario','v.status','pro.modelo','pro.unidadeMedida','v.formaPagamento','v.condicaoPagamento','v.idvenda','i.quantidade','i.valorUnitario','i.valorTotal','v.numeroDeParcelas',DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
	->where('v.idvenda', '=', $id )


	->groupBy('i.iditensv','fun.idfuncionario','cli.idcliente','v.dataVenda','fun.nomeFuncionario','cli.nomeCliente','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','v.status','v.formaPagamento','v.condicaoPagamento','v.idvenda','v.numeroDeParcelas','v.valorTotal')
	->first();  

	$itens=DB::table('itensv as i')

	->join('produto as pro', 'pro.idproduto','=','i.idproduto')
	->join('venda as v', 'i.idvenda','=','v.idvenda')
	->select('i.iditensv','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','v.formaPagamento','v.condicaoPagamento','v.idvenda','i.valorTotal')
	->where('v.idvenda', '=',$id)
	->get();






	return view("venda/venda.show", 
		["venda"=>$venda, "itens"=>$itens]);

}









}
