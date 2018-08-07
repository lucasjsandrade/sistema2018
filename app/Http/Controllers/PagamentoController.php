<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use sistemaLaravel\pagamento;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;
use sistemaLaravel\MovimentacaoCaixa;
use sistemaLaravel\Caixa;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\PagamentoFormRequest;
use sistemaLaravel\Http\requests\ContaspagarFormRequest;
use Carbon\Carbon;
use Response;
use DB;


class PagamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


    }


    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $pagamento = DB::table('pagamento as pag')
                //->join('parcelapagar as par','par.idcontasp', '=', 'con.idcontasp')


                ->select('pag.idpagamento', 'pag.data', 'pag.valor', 'pag.juros', 'pag.multa', 'pag.valorTotal')
                ->orderBy('pag.idpagamento', 'desc')
                ->where('pag.idpagamento', 'LIKE', '%' . $query . '%')
                ->paginate(7);

            return view('pagamento.index', [
                "pagamento" => $pagamento, "searchText" => $query
            ]);
        }
    }


    public function create()
    {

        $pagamento = DB::table('pagamento')
            ->get();

        $contas = DB::table('contaspagar as con')
            ->join('compra as com', 'com.idcompra', '=', 'con.idcompra')
            ->join('parcelapagar as parc', 'parc.idcontasp', '=', 'con.idcontasp')
            ->select(DB::raw('CONCAT(con.idcontasp) as contas'), 'con.idcontasp', 'con.data', 'con.valor'
                , 'con.descricao', 'con.idcompra', 'con.idfornecedor', 'con.parcela')
            ->groupBy('con.idcontasp', 'con.data', 'con.valor'
                , 'con.descricao', 'con.idcompra', 'con.idfornecedor', 'con.parcela')
            ->get();


        $parcelapagar = DB::table('parcelapagar as par')
            ->select(DB::raw('CONCAT(par.idparcela) as parcela'), 'par.idparcela', 'par.dataVencimento',
                'par.valorParcela', 'par.valorPago', 'par.idcontasp')
            ->get();

        return view("pagamento.create",
            ["pagamento" => $pagamento, "contas" => $contas, "parcelapagar" => $parcelapagar]);


    }

    public function store(PagamentoFormRequest $request)
    {

        DB::beginTransaction();
        $pagamento = new Pagamento;
        $mytime = Carbon::now('America/Sao_Paulo');
        $pagamento->data =$mytime->toDateTimeString();
        $pagamento->valor = $request->get('valorPagamento');
        $pagamento->juros =0;
        $pagamento->multa =0;
        $pagamento->valorTotal =$request->get('valorPagamento');
        $pagamento->idparcelap = $request->get('idparcela');
        $pagamento->idparcelap = $str = implode(':',$pagamento->idparcelap);

        $pagamento->save();

        $movimento = new movimentacaocaixa();




        $data = Carbon::now('America/Sao_Paulo');
        $movimento->data = $data->toDateTimeString();
        $movimento->descricao = $request->get('observacao');
        $movimento->valor = $request->get('valorPagamento');
        $movimento->tipoMovimentacao = 'Pagamento';
        $movimento->idcaixa =2;

        $movimento->save();





        DB::commit();
    }


}
