<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Contasreceber;
use sistemaLaravel\parcelaReceber;

use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\ContasreceberFormRequest;
use Illuminate\Support\Collection;
use Response;
use DB;

class ContasreceberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $contas = DB::table('contasreceber as c')
                ->join('venda as ven', 'ven.idvenda', '=',
                    'c.idvenda')
                ->join('cliente as cli', 'cli.idcliente', '=',
                    'c.idcliente')
                ->join('parcelareceber as p', 'p.idcontasr', 'c.idcontasr')
                ->select('ven.idvenda', 'cli.idcliente', 'ven.numeroDeParcelas', 'c.idcontasr', 'c.data', 'c.descricao', 'c.valor','p.idcontasr')
                ->where('c.idcontasr', 'LIKE', '%' . $query . '%', 'or', 'is null')
                ->where('p.status','=','Pendente')
                ->orderBy('c.idcontasr', 'desc')
                ->groupBy('ven.idvenda', 'cli.idcliente', 'ven.numeroDeParcelas', 'c.idcontasr', 'c.data', 'c.descricao', 'c.valor','p.idcontasr')
                ->paginate(7);
            return view('contasreceber.index', [
                "contasreceber" => $contas, "searchText" => $query
            ]);
        }

    }




    public function store(ContaspagarFormRequest $request)
    {
        $contas = new Contaspagar;
        $contas->data = $request->get('data');
        $contas->valor = $request->get('valor');
        $contas->descricao = $request->get('descricao');
        $contas->idfornecedor = $request->get('idfornecedor');
        $contas->idcompra = $request->get('idcompra');
        $contas->parcela = $request->get('parcela');

        $contas->save();
        return Redirect::to('contaspagar');


    }

    public function show($id)
    {


        $contasreceber = DB::table('contasreceber as cr')
            ->join('parcelareceber as parc', 'parc.idcontasr', '=', 'cr.idcontasr')
            ->join('venda as v ', 'v.idvenda', '=', 'cr.idvenda')
            ->select('cr.idcontasr', 'cr.data', 'cr.valor', 'parc.idparcela', 'parc.dataVencimento', 'parc.idcontasr', 'cr.descricao', 'cr.idvenda', 'cr.parcela')
            ->where('cr.idcontasr', '=', $id)
            ->groupBy('cr.idcontasr', 'cr.data', 'cr.valor', 'parc.idparcela', 'parc.dataVencimento', 'parc.idcontasr', 'cr.descricao', 'cr.idvenda', 'cr.parcela')
            ->first();


        $parcelareceber = DB::table('parcelareceber as parc')
            ->join('contasreceber as cr', 'cr.idcontasr', '=', 'parc.idcontasr')
            ->select('parc.idparcela', 'parc.dataVencimento', 'valorParcela', 'parc.idcontasr','parc.status')
            ->where('cr.idcontasr', '=', $id)
            ->where('parc.status', '=', 'pendente')
            ->get();


        return view("contasreceber.show",
            ["contasreceber" => $contasreceber, "parcelareceber" => $parcelareceber]);
    }

    /*
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


 */

    public function find($id)
    {
        $contas = contaspagar::findOrFail($id);

        return $contas;
    }

}


