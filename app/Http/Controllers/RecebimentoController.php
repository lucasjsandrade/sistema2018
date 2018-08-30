<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Requests\RecebimentoFormRequest;
use sistemaLaravel\Recebimento;
use sistemaLaravel\Contasreceber;
use sistemaLaravel\ParcelaReceber;
use sistemaLaravel\MovimentacaoCaixa;
use sistemaLaravel\Caixa;
use sistemaLaravel\Http\Controllers\Pagamento;
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

    public function store(RecebimentoFormRequest $request)
    {
        global $idrec;
        global $idparc;
        global $last_id;
        $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();//consulta a ultima trazacao do caixa


        $valorRecebimento = $request->get('valorRecebimento');

        $valorParcela = $request->get('valorParcela');


        if ($valorRecebimento == $valorParcela) {// *se o valor do recebimento for igual a parcela gera um recebimento,atualiza o status da parcela*
            DB::beginTransaction();
            $recebimento = new Recebimento;

            $mytime = Carbon::now('America/Sao_Paulo');
            $recebimento->data = $mytime->toDateTimeString();
            $recebimento->valor = $request->get('valorParcela');
            $recebimento->valorTotal = $request->get('valorRecebimento');
            $recebimento->idparcela = $request->get('lidparcela');
            $recebimento->idparcela = $str = implode(':', $recebimento->idparcela);
            $recebimento->save();
            $idrec = $recebimento->idrecebimento;
            $idparc = $recebimento->idparcela;
            $parcela = ParcelaReceber::findOrFail($idparc);
            $parcela->valorRecebido = $recebimento->valorTotal;
            $parcela->valorParcela = 0;
            $parcela->status = 'Paga';
            $parcela->update();
            $movimento = new movimentacaocaixa();
            $data = Carbon::now('America/Sao_Paulo');
            $movimento->data = $data->toDateTimeString();
            $movimento->descricao = $request->get('observacao');
            $movimento->valor = $request->get('valorRecebimento');
            $movimento->tipoMovimentacao = 'Recebimento';
            $movimento->idpagamento = 0;
            $movimento->idrecebimento = $idrec;
            $movimento->idcaixa = $last_id->idcaixa;
            $movimento->save();//salva o movimento do caixa

            $caixa = Caixa::findOrFail($last_id->idcaixa);
            $caixa->saldoAtual = $caixa->saldoAtual + $movimento->valor;
            $caixa->update();//atualiza o saldo Atual do caixa
            DB::commit();


        } else {
            DB::rollback();
        }


        if ($valorRecebimento < $valorParcela) {//se o valor do recebimento for menor que a parcela

            DB::beginTransaction();
            $recebimento = new Recebimento;
            $mytime = Carbon::now('America/Sao_Paulo');
            $recebimento->data = $mytime->toDateTimeString();
            $recebimento->valor = $request->get('valorParcela');
            $recebimento->valorTotal = $request->get('valorRecebimento');
            $recebimento->idparcela = $request->get('lidparcela');
            $recebimento->idparcela = $str = implode(':', $recebimento->idparcela);
            $recebimento->save();
            $idrec = $recebimento->idrecebimento;
            $idparc = $recebimento->idparcela;
            $atualizaParcela = $recebimento->valor - $recebimento->valorTotal;
            $parcela = ParcelaReceber::findOrFail($idparc);
            $parcela->valorRecebido = $recebimento->valorTotal;
            $parcela->valorParcela = $atualizaParcela;
            $parcela->status = 'Pendente';
            $parcela->update();
            $movimento = new movimentacaocaixa();
            $data = Carbon::now('America/Sao_Paulo');
            $movimento->data = $data->toDateTimeString();
            $movimento->descricao = $request->get('observacao');
            $movimento->valor = $request->get('valorRecebimento');
            $movimento->tipoMovimentacao = 'Recebimento';
            $movimento->idrecebimento = 0;

            $movimento->idrecebimento = $idrec;
            $movimento->idcaixa = $last_id->idcaixa;
            $movimento->save();//salva o movimento do caixa

            $caixa = Caixa::findOrFail($last_id->idcaixa);
            $caixa->saldoAtual = $caixa->saldoAtual + $movimento->valor;
            $caixa->update();//atualiza o saldo Atual do caixa
            DB::commit();


        } else {
            DB::rollback();
        }


        if ($valorRecebimento > $valorParcela) {//se o valor do recebimento for maior que a parcela

            echo '<script>alert("O valor do Recebimento não pode ser maior que o valor da parcela!!")</script>';

            echo '<script>window.location="caixa"</script>';


        }


    else {

    }


        return \redirect('\caixa');
    }

    public function show($id)
    {
        $recebimento = DB::table('recebimento as rec')
            ->join('parcelareceber as par', 'par.idparcela', '=', 'rec.idparcela')
            ->select('rec.idrecebimento','rec.data','rec.valor', 'par.dataVencimento', 'par.idparcela', 'par.valorParcela', 'par.valorRecebido', 'par.status', 'par.idparcela')
            ->groupBy('rec.idrecebimento','rec.data','rec.valor',  'par.dataVencimento', 'par.idparcela', 'par.valorParcela', 'par.valorRecebido', 'par.status', 'par.idparcela')
            ->where('rec.idrecebimento', '=', $id)
            ->first();


        $parcela = DB::table('parcelareceber as pa')
            ->join('recebimento as rec', 'rec.idparcela', '=', 'pa.idparcela')
            ->join('contasreceber as c', 'c.idcontasr', '=', 'pa.idcontasr')
            ->join('cliente as cli', 'cli.idcliente', '=', 'c.idcliente')
            ->select('pa.valorParcela', 'pa.valorRecebido', 'pa.status', 'pa.idparcela', 'rec.idrecebimento', 'rec.data', 'pa.idcontasr', 'c.parcela', 'cli.idcliente', 'cli.nomeCliente', 'cli.telefone')
            ->groupBy('pa.valorParcela', 'pa.valorRecebido', 'pa.status', 'pa.idparcela', 'rec.idrecebimento', 'rec.data', 'pa.idcontasr', 'c.parcela', 'cli.idcliente', 'cli.nomeCliente', 'cli.telefone')
            ->where('rec.idrecebimento', '=', $id)
            ->first();

        return view("recebimento.show", ["recebimento" => $recebimento, "parcela" => $parcela]);

    }


}