<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Recebimento;
use sistemaLaravel\Contasreceber;
use sistemaLaravel\ParcelaReceber;
use sistemaLaravel\MovimentacaoCaixa;
use sistemaLaravel\Caixa;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\RecebimentoFormRequestFormRequest;
use sistemaLaravel\Http\requests\ContasreceberFormRequest;
use Carbon\Carbon;
use Response;
use DB;

class RecebimentoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');


    }


    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $recebimento = DB::table('recebimento as rec')
                ->select('rec.idrecebimento', 'rec.data', 'rec.valor', 'rec.valorTotal')
                ->orderBy('rec.idrecebimento', 'desc')
                ->where('rec.idrecebimento', 'LIKE', '%' . $query . '%')
                ->paginate(10);

            return view('recebimento.index', [
                "recebimento" => $recebimento, "searchText" => $query]);
        }
    }

    public function create()
    {
        $contasreceber = DB::table('contasreceber as c')
            ->join('parcelareceber as par', 'par.idcontasr', '=', 'c.idcontasr')
            ->join('cliente as cli', 'cli.idcliente', '=', 'c.idcliente')
            ->select('c.idcontasr', 'c.data', 'c.valor', 'c.descricao', 'c.idvenda', 'c.idcliente', 'c.parcela', 'par.idparcela', 'par.status', 'cli.idcliente', 'cli.nomeCliente')
            ->where('par.status', '=', 'pendente')
            ->groupBy('c.idcontasr', 'c.data', 'c.valor', 'c.descricao', 'c.idvenda', 'c.idcliente', 'c.parcela', 'par.idparcela', 'par.status', 'cli.idcliente', 'cli.nomeCliente')
            ->get();


        return view("recebimento.create", ["contasreceber" =>
            $contasreceber]);


    }

    public function store(PagamentoFormRequest $request)
    {
        global $idpag;
        global $idparc;
        global $last_id;
        $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();//consulta a ultima trazacao do caixa


        $valorPagamento = $request->get('valorPagamento');
        $valorParcela = $request->get('valorParcela');
        if ($valorPagamento <= $last_id->saldoAtual) {
            if ($valorPagamento == $valorParcela) {// *se o valor do pagamento for igual a parcela gera um pagamento,atualiza o status da parcela*
                DB::beginTransaction();
                $pagamento = new Pagamento;
                $mytime = Carbon::now('America/Sao_Paulo');
                $pagamento->data = $mytime->toDateTimeString();
                $pagamento->valor = $request->get('valorParcela');
                $pagamento->valorTotal = $request->get('valorPagamento');
                $pagamento->idparcelap = $request->get('lidparcela');
                $pagamento->idparcelap = $str = implode(':', $pagamento->idparcelap);
                $pagamento->save();
                $idpag = $pagamento->idpagamento;
                $idparc = $pagamento->idparcelap;

                $parcela = Parcelapagar::findOrFail($idparc);
                $parcela->valorPago = $pagamento->valorTotal;
                $parcela->valorParcela = 0;
                $parcela->status = 'Paga';
                $parcela->update();
                $movimento = new movimentacaocaixa();
                $data = Carbon::now('America/Sao_Paulo');
                $movimento->data = $data->toDateTimeString();
                $movimento->descricao = $request->get('observacao');
                $movimento->valor = $request->get('valorPagamento');
                $movimento->tipoMovimentacao = 'Pagamento';
                $movimento->idpagamento = $idpag;
                $movimento->idrecebimento = 0;
                $movimento->idcaixa = $last_id->idcaixa;
                $movimento->save();//salva o movimento do caixa

                $caixa = Caixa::findOrFail($last_id->idcaixa);
                $caixa->saldoAtual = $caixa->saldoAtual - $movimento->valor;
                $caixa->update();//atualiza o saldo Atual do caixa
                DB::commit();


            } else {
                DB::rollback();
            }


            if ($valorPagamento < $valorParcela) {//se o valor do pagamento for menor que a parcela

                DB::beginTransaction();
                $pagamento = new Pagamento;
                $mytime = Carbon::now('America/Sao_Paulo');
                $pagamento->data = $mytime->toDateTimeString();
                $pagamento->valor = $request->get('valorParcela');
                $pagamento->valorTotal = $request->get('valorPagamento');
                $pagamento->idparcelap = $request->get('lidparcela');
                $pagamento->idparcelap = $str = implode(':', $pagamento->idparcelap);
                $pagamento->save();
                $idpag = $pagamento->idpagamento;
                $idparc = $pagamento->idparcelap;
                $atualizaParcela = $pagamento->valor - $pagamento->valorTotal;
                $parcela = Parcelapagar::findOrFail($idparc);
                $parcela->valorPago = $pagamento->valorTotal;
                $parcela->valorParcela = $atualizaParcela;
                $parcela->status = 'Pendente';
                $parcela->update();
                $movimento = new movimentacaocaixa();
                $data = Carbon::now('America/Sao_Paulo');
                $movimento->data = $data->toDateTimeString();
                $movimento->descricao = $request->get('observacao');
                $movimento->valor = $request->get('valorPagamento');
                $movimento->tipoMovimentacao = 'Pagamento';
                $movimento->idpagamento = $idpag;
                $movimento->idrecebimento = 0;
                $movimento->idcaixa = $last_id->idcaixa;
                $movimento->save();//salva o movimento do caixa

                $caixa = Caixa::findOrFail($last_id->idcaixa);
                $caixa->saldoAtual = $caixa->saldoAtual - $movimento->valor;
                $caixa->update();//atualiza o saldo Atual do caixa
                DB::commit();


            } else {
                DB::rollback();
            }


            if ($valorPagamento > $valorParcela) {//se o valor do pagamento for maior que a parcela

                echo '<script>alert("O valor do Pagamento não pode ser maior que o valor da parcela!!")</script>';
                echo '<script>window.location="caixa"</script>';


            } else {

            }


        } else {
            echo '<script>alert("O saldo do caixa precisa ser maior que o valor do pagamento!!")</script>';
            echo '<script>window.location="caixa"</script>';
            die();

        }


        return \redirect('\caixa');
    }

    public function show($id)
    {
        $recebimento = DB::table('recebimento as rec')
            ->join('parcelareceber as par', 'par.idparcela', '=', 'rec.idparcela')
            ->select('rec.idrecebimento', 'par.dataVencimento', 'par.idparcela', 'par.valorParcela', 'par.valorRecebido', 'par.status', 'par.idparcela')
            ->groupBy('rec.idrecebimento', 'par.dataVencimento', 'par.idparcela', 'par.valorParcela', 'par.valorRecebido', 'par.status', 'par.idparcela')
            ->where('rec.idrecebimento', '=', $id)
            ->first();


        $parcela = DB::table('parcelareceber as pa')
            ->join('recebimento as rec', 'rec.idparcela', '=', 'pa.idparcela')
            ->join('contasreceber as c', 'c.idcontasr', '=', 'pa.idcontasr')
            ->join('cliente as cli', 'cli.idcliente', '=', 'c.idcliente')
            ->select('pa.valorParcela', 'pa.valorRecebido', 'pa.status', 'pa.idparcela', 'rec.idrecebimento', 'pa.idcontasr', 'c.parcela', 'cli.idcliente', 'cli.nomeCliente', 'cli.telefone')
            ->groupBy('pa.valorParcela', 'pa.valorRecebido', 'pa.status', 'pa.idparcela', 'rec.idrecebimento', 'pa.idcontasr', 'c.parcela', 'cli.idcliente', 'cli.nomeCliente', 'cli.telefone')
            ->where('rec.idrecebimento', '=', $id)
            ->first();

        return view("recebimento.show", ["recebimento" => $recebimento, "parcela" => $parcela]);

    }


}