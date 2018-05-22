<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\compra;
use sistemaLaravel\itensc;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\pedidoFormRequest;
use Carbon\Carbon;
use Response;
use DB;
class pedidoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $compra=DB::table('compra as comp')

            ->join('itensc as itens','itens.idcompra', '=', 'comp.idcompra')

            ->join('produto as pro', 'pro.idproduto', '=', 'itens.idproduto')

            ->join('fornecedor as for', 'for.idfornecedor', '=', 'comp.idfornecedor')

            ->join('funcionario as func', 'func.idfuncionario', '=', 'comp.idfuncionario')

            ->select('comp.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia', 'comp.dataCompra', 'comp.status',DB::raw('sum(itens.quantidade  * itens.valorUnitario) as Total'))

            ->orderBy('comp.idcompra', 'desc')

            ->groupBy ('comp.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia','comp.dataCompra', 'comp.status')


            ->where('comp.idcompra','LIKE', '%'.$query.'%')  
            ->orwhere('comp.dataCompra','LIKE', '%'.$query.'%')  
            ->orwhere('for.razaoSocial','LIKE', '%'.$query.'%')        


            ->paginate(7);

            return view('compra/pedido.index', [
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

        ->get();

        return view("compra.pedido.create",
            ["fornecedor"=>$fornecedor, "funcionario"=>$funcionario, "produto"=>$produto]);
    }



    public function store(pedidoFormRequest $request){

        try{

            DB::beginTransaction();

            $compra = new compra;
            $compra->idfornecedor=$request->get('idfornecedor');
            $compra->idfuncionario=$request->get('idfuncionario');
            $compra->condicaoPagamento=$request->get('condicaoPagamento');
            $mytime = Carbon::now('America/Sao_Paulo'); 
            $compra->dataCompra=$mytime->toDateTimeString();

            $compra->formaPagamento=$request->get('formaPagamento');
            $compra->status='Aberto';

            $compra->save();

            $idproduto=$request->get('idproduto');
            $quantidade=$request->get('quantidade');
            $valorUnitario=$request->get('valorUnitario');
            $valorTotal=$request->get('valorTotal');


            $cont= 0;
            while($cont < count($idproduto)){
                $sub;
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



        }catch(\Exception $e){

            DB::rollback();

            echo("deu ruim"); 

        }

        return Redirect::to('/compra/pedido');
    }

    public function edit($id){

        $pedido = pedido::findOrFail($id);
      $produto = DB::table('produto')
      ->get();
      $funcionario = DB::table('funcionario')
      ->get();
      $fornecedor = DB::table('fornecedor')
      ->get();    
      $compra = DB::table('compra')
      ->get();    
      $itensc = DB::table('itensc')
      ->get(); 
      $produto=DB::table('produto as pro')
      ->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'),'pro.idproduto', 'pro.quantidade','pro.preco')

      ->where('status','=','Ativo')

      ->groupBy('produto', 'pro.idproduto', 'pro.quantidade','pro.preco')
      ->get();


      return view("compra.pedido.edit",
        ["produto"=>$produto, "pedido"=>$pedido, "funcionario"=>$funcionario,"fornecedor"=>$fornecedor,"compra"=>$compra,"itensc"=>$itensc]);

  }

  public function update(pedidoFormRequest $request, $id){
   try{
      DB::beginTransaction();

      $pedido=compra::findOrFail($id);
      $mytime = Carbon::now('America/Sao_Paulo'); 
      $pedido->dataVenda=$mytime->toDateTimeString();
      $pedido->idfornecedor=$request->get('idfornecedor');     
      $pedido->idfuncionario=$request->get('idfuncionario'); 
      $pedido->status='Aberta'; 

      $pedido->update();

      $pedido = pedido::findOrFail($id);

      $usuario = DB::table('itensc')->where('idcompra', '=', $id)->delete();


      $produto   =$request->get('idproduto');
      $idcomra      =$request->get('idcompra');   
  $quantidade      =$request->get('quantidade');   //chegando array ok
  $desconto      =$request->get('desconto');   //chegando array ok  
  $valorUnitario      =$request->get('valorUnitario');   //chegando array ok
  

  $cont = 0;
  while($cont < count($desconto)){
    $itens = new Itensc();
    $itens->idcompra=$pedido->idcompra;
    $itens->idproduto=$produto[$cont];
    $itens->desconto=$pedido->desconto[$cont];    
    $itens->quantidade=$quantidade[$cont];
    $itens->desconto=$desconto[$cont];
    
    $itens->valorUnitario=$valorUnitario[$cont];
    $itens->status='pedido';
    $itens->valorTotal=$valorTotal[$cont]=($valorUnitario[$cont]*$quantidade[$cont])-$desconto[$cont];;

    $itens->save();
    $cont=$cont+1;

}
DB::commit();

}catch(Exception $e){
  DB::rollback();
}

return Redirect::to('compra/pedido');
}




public function show($id){

    $compra=DB::table('compra as comp')
    ->join('itensc as itens', 'itens.idcompra','=','comp.idcompra')
    ->join('produto as pro', 'pro.idproduto','=','itens.idproduto')
    ->join('funcionario as fun', 'fun.idfuncionario','=','comp.idfuncionario')
    ->join('fornecedor as f', 'f.idfornecedor', '=', 
       'comp.idfornecedor')

    ->select('fun.idfuncionario','f.idfornecedor','comp.dataCompra','fun.nomeFuncionario','f.razaoSocial','comp.status','pro.modelo','pro.unidadeMedida','comp.formaPagamento','comp.condicaoPagamento','comp.idcompra','itens.quantidade','itens.valorUnitario','itens.valorTotal',DB::raw('sum((itens.quantidade*itens.valorUnitario))as total'))
    ->where('comp.idcompra', '=', $id )


    ->groupBy('itens.iditensc','fun.idfuncionario','f.idfornecedor','comp.dataCompra','fun.nomeFuncionario','f.razaoSocial','pro.modelo','pro.unidadeMedida','itens.quantidade','itens.valorUnitario','itens.valorTotal','comp.status','comp.formaPagamento','comp.condicaoPagamento','comp.idcompra')
    ->first();  

    $itensc=DB::table('itensc as itens')

    ->join('produto as pro', 'pro.idproduto','=','itens.idproduto')
    ->join('compra as comp', 'itens.idcompra','=','comp.idcompra')
    ->select('itens.iditensc','pro.idproduto','pro.modelo','pro.unidadeMedida','itens.quantidade','itens.valorUnitario','itens.valorTotal','comp.formaPagamento','comp.condicaoPagamento','comp.idcompra')
    ->where('comp.idcompra', '=',$id)
    ->get();


    return view("compra/pedido.show", 
        ["compra"=>$compra, "itensc"=>$itensc]);

}

public function destroy($id){
    $pedido=pedido::findOrFail($id);
    $pedido->status='Cancelado'; 
    $pedido->update();
    return Redirect::to('pedido');      
}
}