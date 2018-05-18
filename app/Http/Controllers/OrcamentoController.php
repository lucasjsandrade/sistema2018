<?php
namespace sistemaLaravel\Http\Controllers;
use Carbon\Carbon;
use DB;
use sistemaLaravel\venda;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Response;
use sistemaLaravel\Http\requests\orcamentoFormRequest;
use sistemaLaravel\Itensv;
use sistemaLaravel\Orcamento;


class OrcamentoController extends Controller
{

	public function __construct(){
		$this->middleware('auth');

	}

	public function index(Request $request){

		if($request){
			$query=trim($request->get('searchText'));
			$venda=DB::table('venda as o')	

			->join('funcionario as func', 'func.idfuncionario', '=', 'o.idfuncionario')
			->join('cliente as cli', 'cli.idcliente', '=', 'o.idcliente')

			->select('o.idvenda','o.dataVenda', 'o.status','func.idfuncionario','func.nomeFuncionario','cli.idcliente','cli.nomeCliente')
      ->where('o.status','=','Aberta')
      ->where('o.idvenda','LIKE', '%'.$query.'%') 	
      ->orderBy('o.idvenda', 'desc')
      ->paginate(7);


      return view('venda/orcamento.index', [
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

    ->groupBy('produto', 'pro.idproduto', 'pro.quantidade','pro.preco')
    ->get();



    return view("venda.orcamento.create",
     ["produto"=>$produto,"funcionario"=>$funcionario, "cliente"=>$cliente]);
  }



  public function store(orcamentoFormRequest $request){


   try{

    DB::beginTransaction();


    $orcamento = new venda;
    $mytime = Carbon::now('America/Sao_Paulo'); 
    $orcamento->dataVenda=$mytime->toDateTimeString();
    $orcamento->idcliente=$request->get('idcliente');			
    $orcamento->idfuncionario=$request->get('idfuncionario');	
    $orcamento->status='Aberta';
    $orcamento->origemVenda='Orçamento'; 

    $orcamento->save();


    $idproduto=$request->get('idproduto');
    $quantidade=$request->get('pquantidade');
    $valorUnitario=$request->get('pvalorUnitario');
    $desconto= $request->get('pdesconto');
    $maodeobra= $request->get('pmaodeobra');




    for( $cont= 0; $cont < count($idproduto); $cont++ ){
     $itens = new Itensv();
     $itens->idvenda=$orcamento->idvenda;
     $itens->desconto=$orcamento->idorcamento[$cont];
     $itens->idproduto=$idproduto[$cont];
     $itens->quantidade=$quantidade[$cont];
     $itens->desconto=$desconto[$cont];
     $itens->maodeobra=$maodeobra[$cont];
     $itens->valorUnitario=$valorUnitario[$cont];
     $itens->status='orcamento';

     
     $itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont])+$maodeobra[$cont]-$desconto[$cont];;

     $itens->save();

   }


   DB::commit();

   return Redirect::to('/venda/orcamento');


 }catch(\Exception $e){
   echo "<script>alert('Erro ao salvar no BD!');</script>";

   DB::rollback();

   echo "<script>window.location = '/venda/orcamento';</script>"; 

 }

}


public function edit($id){

  $orcamento = Orcamento::findOrFail($id);
  $produto = DB::table('produto')
  ->get();
  $funcionario = DB::table('funcionario')
  ->get();
  $cliente = DB::table('cliente')
  ->get();    
  $venda = DB::table('venda')
  ->get();    
  $itensv = DB::table('itensv')
  ->get(); 
  $produto=DB::table('produto as pro')
  ->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'),'pro.idproduto', 'pro.quantidade','pro.preco')

  ->where('status','=','Ativo')

  ->groupBy('produto', 'pro.idproduto', 'pro.quantidade','pro.preco')
  ->get();


  return view("venda.orcamento.edit",
    ["produto"=>$produto, "orcamento"=>$orcamento, "funcionario"=>$funcionario,"cliente"=>$cliente,"venda"=>$venda,"itensv"=>$itensv]);

}

public function update(orcamentoFormRequest $request, $id){
 try{
  DB::beginTransaction();

  $orcamento=venda::findOrFail($id);
  $mytime = Carbon::now('America/Sao_Paulo'); 
  $orcamento->dataVenda=$mytime->toDateTimeString();
  $orcamento->idcliente=$request->get('idcliente');     
  $orcamento->idfuncionario=$request->get('idfuncionario'); 
  $orcamento->status='Aberta';
  $orcamento->origemVenda='Orçamento'; 

  $orcamento->update();

  $orcamento = Orcamento::findOrFail($id);

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

return Redirect::to('venda/orcamento');
}





public function show($id){

  $venda=DB::table('venda as v')
  ->join('itensv as i', 'i.idvenda','=','v.idvenda')
  ->join('produto as pro', 'pro.idproduto','=','i.idproduto')
  ->join('funcionario as fun', 'fun.idfuncionario','=','v.idfuncionario')
  ->join('cliente as cli', 'cli.idcliente', '=', 
    'v.idcliente')

  ->select('fun.idfuncionario','cli.idcliente','cli.nomeCliente','v.dataVenda','fun.nomeFuncionario','fun.nomeFuncionario','v.status','pro.modelo','pro.unidadeMedida','v.idvenda','i.quantidade','i.valorUnitario','i.valorTotal',DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
  ->where('v.idvenda', '=', $id )


  ->groupBy('i.iditensv','fun.idfuncionario','cli.idcliente','v.dataVenda','fun.nomeFuncionario','cli.nomeCliente','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','v.status','v.idvenda')
  ->first();  

  $itens=DB::table('itensv as i')

  ->join('produto as pro', 'pro.idproduto','=','i.idproduto')
  ->join('venda as v', 'i.idvenda','=','v.idvenda')
  ->select('i.iditensv','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','v.idvenda','i.maodeobra','i.desconto',DB::raw('sum(((i.valorUnitario*i.quantidade)+i.maodeobra)-i.desconto)as valorFinal'))
  
  ->where('v.idvenda', '=',$id)
//DB::raw('sum(((quantidade*valorUnitario)+maodeobra)-desconto) as somaFinal')

  ->groupBy('i.iditensv','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','v.idvenda','i.maodeobra','i.desconto') 
  ->get();

  return view("venda/orcamento.show", 
    ["venda"=>$venda, "itens"=>$itens]);

}

public function destroy($id){
 $orcamento=venda::findOrFail($id);

 $orcamento->status = 'Cancelado';

    	//$itensv->delete();
 $orcamento->update();

 return Redirect::to('venda/orcamento');
}
}

