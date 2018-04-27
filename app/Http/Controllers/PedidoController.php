<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\pedido;
use sistemaLaravel\itensp;
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
            $pedido=DB::table('pedido as ped')

            ->join('itensp as itens','itens.idpedido', '=', 'ped.idpedido')

            ->join('produto as pro', 'pro.idproduto', '=', 'itens.idproduto')

            ->join('fornecedor as for', 'for.idfornecedor', '=', 'ped.idfornecedor')

            ->join('funcionario as func', 'func.idfuncionario', '=', 'ped.idfuncionario')

            ->select('ped.idpedido', 'func.nomeFuncionario', 'for.nomeFantasia', 'ped.dataPedido', 'ped.status',DB::raw('sum(itens.quantidade  * itens.valorUnitario) as Total'))

            ->orderBy('ped.idpedido', 'desc')

            ->groupBy ('ped.idpedido', 'func.nomeFuncionario', 'for.nomeFantasia','ped.dataPedido', 'ped.status')


            ->where('ped.idpedido','LIKE', '%'.$query.'%')  
            ->orwhere('ped.dataPedido','LIKE', '%'.$query.'%')  
            ->orwhere('for.razaoSocial','LIKE', '%'.$query.'%') 
            
            


            ->paginate(7);




            return view('pedido.index', [
                "pedido"=>$pedido, "searchText"=>$query
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

        return view("pedido.create",
            ["fornecedor"=>$fornecedor, "funcionario"=>$funcionario, "produto"=>$produto]);
    }



    public function store(pedidoFormRequest $request){

        try{

            DB::beginTransaction();

            $pedido = new pedido;
            $pedido->idfornecedor=$request->get('idfornecedor');
            $pedido->idfuncionario=$request->get('idfuncionario');
            $pedido->condicaoPagamento=$request->get('condicaoPagamento');
            $mytime = Carbon::now('America/Sao_Paulo'); 
            $pedido->dataPedido=$mytime->toDateTimeString();

            $pedido->formaPagamento=$request->get('formaPagamento');
            $pedido->status='Aberto';

            $pedido->save();

            $idproduto=$request->get('idproduto');
            $quantidade=$request->get('quantidade');
            $valorUnitario=$request->get('valorUnitario');
            $valorTotal=$request->get('valorTotal');


            $cont= 0;
            while($cont < count($idproduto)){
                $sub;
                $itens = new itensp();
                $itens->idpedido=$pedido->idpedido;
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

        return Redirect::to('pedido');
    }

    public function show($id){

        $pedido=DB::table('pedido as ped')
        ->join('itensp as i', 'i.idpedido','=','ped.idpedido')
        ->join('produto as pro', 'pro.idproduto','=','i.idproduto')
        ->join('funcionario as fun', 'fun.idfuncionario','=','ped.idfuncionario')
        ->join('fornecedor as f', 'f.idfornecedor', '=', 
            'ped.idfornecedor')

        ->select('fun.idfuncionario','f.idfornecedor','ped.dataPedido','fun.nomeFuncionario','f.razaoSocial','ped.status','pro.modelo','pro.unidadeMedida','ped.formaPagamento','ped.condicaoPagamento','ped.idpedido','i.quantidade','i.valorUnitario','i.valorTotal',DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
        ->where('ped.idpedido', '=', $id )


        ->groupBy('i.iditens','fun.idfuncionario','f.idfornecedor','ped.dataPedido','fun.nomeFuncionario','f.razaoSocial','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','ped.status','ped.formaPagamento','ped.condicaoPagamento','ped.idpedido')
        ->first();  

        $itensp=DB::table('itensp as i')

        ->join('produto as pro', 'pro.idproduto','=','i.idproduto')
        ->join('pedido as ped', 'i.idpedido','=','ped.idpedido')
        ->select('i.iditens','pro.idproduto','pro.modelo','pro.unidadeMedida','i.quantidade','i.valorUnitario','i.valorTotal','ped.formaPagamento','ped.condicaoPagamento','ped.idpedido')
        ->where('ped.idpedido', '=',$id)
        ->get();

        





        return view("pedido.show", 
            ["pedido"=>$pedido, "itensp"=>$itensp]);

    }

    public function destroy($id){
        $pedido=pedido::findOrFail($id);
        $pedido->status='Cancelado'; 
        $pedido->update();
        return Redirect::to('pedido');      
    }
}