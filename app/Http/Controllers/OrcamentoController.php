<?php
namespace sistemaLaravel\Http\Controllers;
use Carbon\Carbon;
use DB;
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
			$orcamento=DB::table('orcamento as o')	

			->join('funcionario as func', 'func.idfuncionario', '=', 'o.idfuncionario')
			->join('cliente as cli', 'cli.idcliente', '=', 'o.idcliente')

			->select('o.idorcamento','o.dataOrcamento', 'o.status','func.idfuncionario','func.nomeFuncionario','cli.idcliente','cli.nomeCliente')
			->where('o.idorcamento','LIKE', '%'.$query.'%') 	
			->orderBy('o.idorcamento', 'desc')
			->paginate(7);


			return view('venda/orcamento.index', [
				"orcamento"=>$orcamento, "searchText"=>$query
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


    		$orcamento = new orcamento;
    		$mytime = Carbon::now('America/Sao_Paulo');

    		$orcamento->dataOrcamento=$mytime->toDateTimeString();
    		$orcamento->observacao=$request->get('observacao');		

    		$orcamento->idcliente=$request->get('idcliente');			
    		$orcamento->idfuncionario=$request->get('idfuncionario');	
    		$orcamento->status='Aberto';
    		$orcamento->idcliente=$request->get('idcliente');	


    		$orcamento->save();


    		$idproduto=$request->get('idproduto');
    		$quantidade=$request->get('pquantidade');
    		$valorUnitario=$request->get('pvalorUnitario');
    		$desconto= $request->get('pdesconto');
    		$maodeobra= $request->get('pmaodeobra');



    		for( $cont= 0; $cont < count($idproduto); $cont++ ){
    			$itens = new Itensv();
    			$itens->idorcamento=$orcamento->idorcamento;
    			$itens->desconto=$orcamento->idorcamento[$cont];
    			$itens->idproduto=$idproduto[$cont];
    			$itens->quantidade=$quantidade[$cont];
    			$itens->desconto=$desconto[$cont];
    			$itens->maodeobra=$maodeobra[$cont];
    			$itens->valorUnitario=$valorUnitario[$cont];
    			$itens->status='orcamento';

    			$itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont]);


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

        $produto=DB::table('produto as pro')
        ->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'),'pro.idproduto', 'pro.quantidade','pro.preco')

        ->where('status','=','Ativo')
        
        ->groupBy('produto', 'pro.idproduto', 'pro.quantidade','pro.preco')
        ->get();


        return view("venda.orcamento.edit",
          ["orcamento"=>$orcamento, "produto"=>$produto, "funcionario"=>$funcionario,"cliente"=>$cliente]);

    }

    public function update(OrcamentoFormRequest $request, $id){
        $orcamento=Orcamento::findOrFail($id);
        
       /* 
        $orcamento->idorcamento=$request->get('idorcamento');
        $orcamento->idcliente=$request->get('idcliente');
        $orcamento->status=$request->get('status');
        $orcamento->observacao=$request->get('observacao');
        $orcamento->maodeobra=$request->get('maodeobra');
        */


        $orcamento->update();


        return Redirect::to('venda/orcamento');
    }





    public function show($id){

    	$orcamento=DB::table('orcamento as o')
    	->join('itensv as i', 'i.idorcamento','=','o.idorcamento')
    	->join('produto as pro', 'pro.idproduto','=','i.idproduto')
    	->join('funcionario as fun', 'fun.idfuncionario','=','o.idfuncionario')
    	->join('cliente as cli', 'cli.idcliente', '=', 
    		'o.idcliente')

    	->select('fun.idfuncionario','cli.idcliente','cli.nomeCliente','o.dataOrcamento','fun.nomeFuncionario','fun.nomeFuncionario','o.status','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','o.idorcamento',DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
    	->where('o.idorcamento', '=', $id )


    	->groupBy('i.iditensv','fun.idfuncionario','cli.idcliente','o.dataOrcamento','fun.nomeFuncionario','cli.nomeCliente','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','o.status','o.idorcamento')
    	->first();

    	$itens=DB::table('itensv as i')

    	->join('produto as pro', 'pro.idproduto','=','i.idproduto')
    	->join('orcamento as o', 'i.idorcamento','=','o.idorcamento')
    	->join('categoria as cat', 'cat.idcategoria','=','pro.idcategoria')
    	->select('i.iditensv','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','o.idvenda','o.idorcamento','cat.nome')
    	->where('o.idorcamento', '=',$id)
    	->get();






    	return view("venda/orcamento.show", 
    		["orcamento"=>$orcamento, "itens"=>$itens]);

    }

    public function destroy($id){
    	$orcamento=orcamento::findOrFail($id);
    	
    	$orcamento->status = 'Cancelado';

    	//$itensv->delete();
    	$orcamento->update();

    	return Redirect::to('venda/orcamento');
    }
}

