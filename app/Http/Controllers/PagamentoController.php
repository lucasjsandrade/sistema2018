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
        $contaspagar = DB::table('contaspagar as c')
            ->join('parcelapagar as par', 'par.idcontasp', '=', 'c.idcontasp')
            ->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')
            ->select('c.idcontasp', 'c.data', 'c.valor', 'c.descricao', 'c.idcompra', 'c.idfornecedor', 'c.parcela', 'par.idparcela', 'par.status','for.idfornecedor','for.razaoSocial')
            ->where('par.status', '=', 'pendente')
            ->groupBy('c.idcontasp', 'c.data', 'c.valor', 'c.descricao', 'c.idcompra', 'c.idfornecedor', 'c.parcela', 'par.idparcela', 'par.status','for.idfornecedor','for.razaoSocial')
            ->get();


        return view("pagamento.create", ["contaspagar" =>
            $contaspagar]);


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
                echo '<script>alert("Movimento Realizado com Sucesso!!")</script>';
                echo '<script>window.location="/caixa"</script>';
                exit("Saiu do codigo");


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
                $atualizaParcela =  $pagamento->valor - $pagamento->valorTotal;
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
                echo '<script>alert("Movimento Realizado com Sucesso!!")</script>';
                echo '<script>window.location="/caixa"</script>';
                exit("Saiu do codigo");

            } else {
                DB::rollback();
            }


            if ($valorPagamento > $valorParcela) {//se o valor do pagamento for maior que a parcela

                echo '<script>alert("O valor do Pagamento não pode ser maior que o valor da parcela!!")</script>';
                echo '<script>window.location="caixa"</script>';
                exit("Saiu do codigo");

            } else {

            }


        } else {
            echo '<script>alert("O saldo do caixa precisa ser maior que o valor do Pagamento!!")</script>';
            echo '<script>window.location="caixa"</script>';
            exit("Saiu do codigo");
        }


        return \redirect('\caixa');
    }

    public function show($id)
    {
        $pagamento = DB::table('pagamento as pag')
            ->join('parcelapagar as par', 'par.idparcela', '=', 'pag.idparcelap')
            ->select('pag.idpagamento', 'pag.data', 'pag.valorTotal', 'pag.idparcelap', 'par.valorParcela', 'par.valorPago', 'par.status', 'par.idparcela')
            ->groupBy('pag.idpagamento', 'pag.data', 'pag.valorTotal', 'pag.idparcelap', 'par.valorParcela', 'par.valorPago', 'par.status', 'idparcela')
            ->where('pag.idpagamento', '=', $id)
            ->first();


        $parcela = DB::table('parcelapagar as pa')
            ->join('pagamento as pag', 'pa.idparcela', '=', 'pag.idparcelap')
            ->join('contaspagar as c', 'c.idcontasp', '=', 'pa.idcontasp')
            ->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')
            ->select('pa.valorParcela', 'pa.valorPago', 'pa.status', 'pa.idparcela', 'pag.idpagamento', 'pa.idcontasp', 'c.parcela','for.idfornecedor','for.razaoSocial','for.telefone')
            ->groupBy('pa.valorParcela', 'pa.valorPago', 'pa.status', 'pa.idparcela', 'pag.idpagamento', 'pa.idcontasp', 'c.parcela','idfornecedor','for.razaoSocial','for.telefone')
            ->where('pag.idpagamento', '=', $id)
            ->first();

        return view("pagamento.show", ["pagamento" => $pagamento, "parcela" => $parcela]);


    }

}
