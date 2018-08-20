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


                ->select('pag.idpagamento', 'pag.data', 'pag.valor', 'pag.valorTotal')
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


        return view("pagamento.create");


    }

    public function store(PagamentoFormRequest $request)
    {

        DB::beginTransaction();
        $pagamento = new Pagamento;
        $mytime = Carbon::now('America/Sao_Paulo');
        $pagamento->data = $mytime->toDateTimeString();
        $pagamento->valor = $request->get('valorPagamento');
        $pagamento->valorTotal = $request->get('valorPagamento');
        $pagamento->idparcelap = $request->get('lidparcela');
        $pagamento->idparcelap = $str = implode(':', $pagamento->idparcelap);

        $pagamento->save();

        $last_id=DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();
        $idpag = $pagamento->idpagamento;
        $movimento = new movimentacaocaixa();
        $data = Carbon::now('America/Sao_Paulo');
        $movimento->data = $data->toDateTimeString();
        $movimento->descricao = $request->get('observacao');
        $movimento->valor = $request->get('valorPagamento');
        $movimento->tipoMovimentacao = 'Pagamento';
        $movimento->idpagamento = $idpag;
        $movimento->idrecebimento =0;
        $movimento->idcaixa =$last_id->idcaixa;

        $movimento->save();

        $caixa = Caixa::findOrFail($last_id->idcaixa);

        $caixa->saldoAtual = $caixa->saldoAtual-$movimento->valor;
        $caixa->update();




        DB::commit();

        return \redirect('\caixa');
    }




}
