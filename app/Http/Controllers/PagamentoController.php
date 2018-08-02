<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use sistemaLaravel\pagamento;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;
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
            ->select(DB::raw('CONCAT(con.idcontasp, ":", con.data) as contas'), 'con.idcontasp', 'con.data', 'con.valor'
                , 'con.descricao', 'con.idcompra', 'con.idfornecedor')
            ->get();


        $parcelapagar = DB::table('parcelapagar as par')
            ->select(DB::raw('CONCAT(par.idparcela, " : ", par.dataVencimento) as parcela'), 'par.idparcela', 'par.dataVencimento',
                'par.valorParcela', 'par.valorPago', 'par.idcontasp')
            ->get();

        return view("pagamento.create",
            ["pagamento" => $pagamento, "contas" => $contas, "parcelapagar" => $parcelapagar]);


    }


}
