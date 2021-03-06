<?php

namespace sistemaLaravel\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Response;
use sistemaLaravel\Contasreceber;
use sistemaLaravel\MovimentacaoCaixa;
use sistemaLaravel\Caixa;
use sistemaLaravel\Http\requests\orcamentoFormRequest;
use sistemaLaravel\Itensv;
use sistemaLaravel\Orcamento;
use sistemaLaravel\Parcelareceber;
use sistemaLaravel\Venda;


class OrcamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $venda = DB::table('venda as o')
                ->join('funcionario as func', 'func.idfuncionario', '=', 'o.idfuncionario')
                ->join('cliente as cli', 'cli.idcliente', '=', 'o.idcliente')
                ->join('itensv as i', 'i.idvenda', '=', 'o.idvenda')
                ->select('o.idvenda', 'o.dataVenda', 'o.valorTotal', 'o.status', 'func.idfuncionario', 'func.nomeFuncionario', 'cli.idcliente', 'cli.nomeCliente')
                ->where('o.status', '=', 'Aberta')
                ->where('o.idvenda', 'LIKE', '%' . $query . '%')
                ->groupBy('o.idvenda', 'o.dataVenda', 'o.valorTotal', 'o.status', 'func.idfuncionario', 'func.nomeFuncionario', 'cli.idcliente', 'cli.nomeCliente')
                ->orderBy('o.idvenda', 'desc')
                ->paginate(7);


            return view('venda/orcamento.index', [
                "venda" => $venda, "searchText" => $query
            ]);
        }
    }

    public function create()
    {

        $funcionario = DB::table('funcionario')
            ->where('status', '=', 'Ativo')
            ->get();
        $cliente = DB::table('cliente')
            ->where('status', '=', 'Ativo')
            ->get();
        $produto = DB::table('produto as pro')
            ->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'), 'pro.idproduto', 'pro.quantidade', 'pro.preco')
            ->where('status', '=', 'Ativo')
            ->groupBy('produto', 'pro.idproduto', 'pro.quantidade', 'pro.preco')
            ->get();


        return view("venda.orcamento.create",
            ["produto" => $produto, "funcionario" => $funcionario, "cliente" => $cliente]);
    }


    public function store(orcamentoFormRequest $request)
    {


        try {

            DB::beginTransaction();


            $orcamento = new venda;
            $mytime = Carbon::now('America/Sao_Paulo');
            $orcamento->dataVenda = $mytime->toDateTimeString();
            $orcamento->idcliente = $request->get('idcliente');
            $orcamento->idfuncionario = $request->get('idfuncionario');
            $orcamento->valorTotal = $request->get('valorTotal');
            $orcamento->status = $request->get('status');
            $orcamento->origemVenda = 'Orçamento';

            $orcamento->save();


            $idproduto = $request->get('idproduto');
            $quantidade = $request->get('pquantidade');
            $valorUnitario = $request->get('pvalorUnitario');
            $desconto = $request->get('pdesconto');
            $maodeobra = $request->get('pmaodeobra');


            for ($cont = 0; $cont < count($idproduto); $cont++) {
                $itens = new Itensv();
                $itens->idvenda = $orcamento->idvenda;
                $itens->desconto = $orcamento->idorcamento[$cont];
                $itens->idproduto = $idproduto[$cont];
                $itens->quantidade = $quantidade[$cont];
                $itens->desconto = $desconto[$cont];
                $itens->maodeobra = $maodeobra[$cont];
                $itens->valorUnitario = $valorUnitario[$cont];
                $itens->status = 'orcamento';


                $itens->valorTotal = $valorTotal[$cont] = ($valorUnitario[$cont] * $quantidade[$cont]) + $maodeobra[$cont] - $desconto[$cont];;


                $itens->save();

            }


            DB::commit();

            return Redirect::to('/venda/orcamento');


        } catch (\Exception $e) {
            echo "<script>alert('Erro ao salvar no BD!');</script>";

            DB::rollback();

            echo "<script>window.location = '/venda/orcamento';</script>";

        }

    }


    public function edit($id)
    {


        $orcamento = Orcamento::findOrFail($id);
        $produto = DB::table('produto')
            ->get();
        $funcionario = DB::table('funcionario')
            ->get();
        $cliente = DB::table('cliente')
            ->get();
        $venda = DB::table('venda')
            ->get();
        $itensv = DB::table('itensv')
            ->get();
        $produto = DB::table('produto as pro')
            ->select(DB::raw('CONCAT(pro.idproduto, " : ", pro.modelo) as produto'), 'pro.idproduto', 'pro.quantidade', 'pro.preco')
            ->where('status', '=', 'Ativo')
            ->groupBy('produto', 'pro.idproduto', 'pro.quantidade', 'pro.preco')
            ->get();


        return view("venda.orcamento.edit",
            ["produto" => $produto, "orcamento" => $orcamento, "funcionario" => $funcionario, "cliente" => $cliente, "venda" => $venda, "itensv" => $itensv]);

    }

    public function update(orcamentoFormRequest $request, $id)
    {

        global $last_id;
        $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();

        $orcamento = venda::findOrFail($id);
        $orcamento->status = $request->get('status');

        /* **Altera Orçamento** */
        if ($orcamento->status == 'Aberta') {

            try {
                DB::beginTransaction();


                $mytime = Carbon::now('America/Sao_Paulo');
                $orcamento->dataVenda = $mytime->toDateTimeString();
                $orcamento->idcliente = $request->get('idcliente');
                $orcamento->idfuncionario = $request->get('idfuncionario');
                $orcamento->valorTotal = $request->get('total');
                $orcamento->status = 'Aberta';
                $orcamento->origemVenda = 'Orçamento';

                $orcamento->update();
                /*Altera Itens da venda */
                $orcamento = Orcamento::findOrFail($id);

                $usuario = DB::table('itensv')->where('idvenda', '=', $id)->delete();


                $produto = $request->get('idproduto');
                $idvenda = $request->get('idvenda');
                $quantidade = $request->get('quantidade');
                $desconto = $request->get('desconto');
                $maodeobra = $request->get('maodeobra');
                $valorUnitario = $request->get('valorUnitario');


                $cont = 0;
                while ($cont < count($desconto)) {
                    $itens = new Itensv();
                    $itens->idvenda = $orcamento->idvenda;
                    $itens->idproduto = $produto[$cont];
                    $itens->desconto = $orcamento->desconto[$cont];
                    $itens->quantidade = $quantidade[$cont];
                    $itens->desconto = $desconto[$cont];
                    $itens->maodeobra = $maodeobra[$cont];
                    $itens->valorUnitario = $valorUnitario[$cont];
                    $itens->status = 'orcamento';
                    $itens->valorTotal = $valorTotal[$cont] = ($valorUnitario[$cont] * $quantidade[$cont]) + $maodeobra[$cont] - $desconto[$cont];;

                    $itens->save();
                    $cont = $cont + 1;

                }
                DB::commit();

            } catch (Exception $e) {
                DB::rollback();
            }

            return Redirect::to('venda/orcamento');
        } /* **Gera a  venda fechada e gera contas a receber** */


        $condicaoPagamento = $request->get('condicaoPagamento');

        if ($last_id->situacao == 'Aberto') {

            if ($orcamento->status == 'Fechada') {
                if ($condicaoPagamento == 'Avista') {

                    //dd($condicaoPagamento);

                    DB::beginTransaction();
                    /*Altera dados do orçamento e salva como venda fechada */

                    $mytime = Carbon::now('America/Sao_Paulo');
                    $orcamento->dataVenda = $mytime->toDateTimeString();
                    $orcamento->idcliente = $request->get('idcliente');
                    $orcamento->idfuncionario = $request->get('idfuncionario');
                    $orcamento->valorTotal = $request->get('total');
                    $orcamento->numeroDeParcelas = $request->get('numeroDeParcelas');
                    $orcamento->status = 'Fechada';
                    $orcamento->origemVenda = 'Orçamento';
                    $orcamento->update();


                    $movimento = new movimentacaocaixa();

                    $data = Carbon::now('America/Sao_Paulo');

                    $movimento->idcaixa = $last_id->idcaixa;
                    $movimento->data = $data->toDateTimeString();

                    $movimento->valor = $request->get('total');

                    $movimento->tipoMovimentacao = 'Venda através do orçamento';
                    $movimento->idrecebimento = 0;
                    $movimento->idpagamento = 0;
                    $movimento->save();


                    $orcamento = Orcamento::findOrFail($id);
                    $usuario = DB::table('itensv')->where('idvenda', '=', $id)->delete();
                    $produto = $request->get('idproduto');
                    $idvenda = $request->get('idvenda');
                    $quantidade = $request->get('quantidade');
                    $desconto = $request->get('desconto');
                    $maodeobra = $request->get('maodeobra');
                    $valorUnitario = $request->get('valorUnitario');
                    $estoque = $request->get('estoque');
                    $valorUnitario = $request->get('valorUnitario');


                    foreach ($produto as $key => $value) { //Pesqusia linha a linha da tabela

                        $estoque = DB::table('produto as p')
                            ->select('p.quantidade')
                            ->where('p.idproduto', '=', $value)
                            ->get();
                        $estoque = $estoque->toArray();
                        $estoque = $estoque[0]->quantidade;

                        if ($quantidade[$key] > $estoque) {
                            echo "<script>alert('Estoque Insuficiente');</script>";
                            echo "<script>window.location = '/venda/orcamento';</script>";
                            die();

                            /*NAO SALVA VENDA*/

                        } else {
                            echo('ESTOQUE MAIOR');
                            echo('<br>');
                            /*SALVAR VENDA*/
                            $cont = 0;
                            while ($cont < count($desconto)) {
                                $itens = new Itensv();
                                $itens->idvenda = $orcamento->idvenda;
                                $itens->idproduto = $produto[$cont];
                                $itens->desconto = $orcamento->desconto[$cont];
                                $itens->quantidade = $quantidade[$cont];
                                $itens->desconto = $desconto[$cont];
                                $itens->maodeobra = $maodeobra[$cont];
                                $itens->valorUnitario = $valorUnitario[$cont];
                                $itens->status = 'orcamento';
                                $itens->valorTotal = $valorTotal[$cont] = ($valorUnitario[$cont] * $quantidade[$cont]) + $maodeobra[$cont] - $desconto[$cont];

                                $itens->save();
                                $cont = $cont + 1;
                            }
                        }

                    }

                    $caixa = Caixa::findOrFail($last_id->idcaixa);
                    $caixa->saldoAtual = $caixa->saldoAtual + $movimento->valor;
                    $caixa->update();//atualiza o saldo Atual do caixa
                    DB::commit();


                } else {
                    DB::rollback();
                }

                if ($condicaoPagamento == 'Aprazo') {

                    //dd($condicaoPagamento);

                    DB::beginTransaction();
                    /*Altera dados do orçamento e salva como venda fechada */

                    $mytime = Carbon::now('America/Sao_Paulo');
                    $orcamento->dataVenda = $mytime->toDateTimeString();
                    $orcamento->idcliente = $request->get('idcliente');
                    $orcamento->idfuncionario = $request->get('idfuncionario');
                    $orcamento->valorTotal = $request->get('total');
                    $orcamento->numeroDeParcelas = $request->get('numeroDeParcelas');

                    $orcamento->status = 'Fechada';
                    $orcamento->origemVenda = 'Orçamento';
                    $orcamento->update();

                    /*Gera contas a receber */

                    $contas = new Contasreceber;
                    $contas->idvenda = $orcamento->idvenda;
                    $contas->idcliente = $request->get('idcliente');
                    $contas->data = $mytime->toDateTimeString();
                    $contas->valor = $orcamento->valorTotal;
                    $contas->descricao = 'Gerado Pelo Orçamento!';;
                    $contas->parcela = $orcamento->numeroDeParcelas;
                    $contas->save();

                    /*Gera Parcela a Receber*/
                    $cont = 0;
                    $dataParcela = $orcamento->dataVenda;
                    while ($cont < ($orcamento->numeroDeParcelas)) {

                        $numero = DB::table('contasreceber')->max('idcontasr');
                        $parcela = new ParcelaReceber();
                        $parcela->idcontasr = $numero;
                        $parcela->status = 'Pendente';
                        $parcela->valorParcela = ($orcamento->valorTotal / $orcamento->numeroDeParcelas);
                        $dataParcela = date("Y-m-d", strtotime("+1 month", strtotime($dataParcela)));
                        $parcela->dataVencimento = $dataParcela;
                        $cont = $cont + 1;
                        $parcela->save();

                    }


                    $orcamento = Orcamento::findOrFail($id);
                    $usuario = DB::table('itensv')->where('idvenda', '=', $id)->delete();
                    $produto = $request->get('idproduto');
                    $idvenda = $request->get('idvenda');
                    $quantidade = $request->get('quantidade');
                    $desconto = $request->get('desconto');
                    $maodeobra = $request->get('maodeobra');
                    $valorUnitario = $request->get('valorUnitario');
                    $estoque = $request->get('estoque');
                    $valorUnitario = $request->get('valorUnitario');

                    foreach ($produto as $key => $value) { //Pesqusia linha a linha da tabela

                        $estoque = DB::table('produto as p')
                            ->select('p.quantidade')
                            ->where('p.idproduto', '=', $value)
                            ->get();
                        $estoque = $estoque->toArray();
                        $estoque = $estoque[0]->quantidade;

                        if ($quantidade[$key] > $estoque) {
                            echo "<script>alert('Estoque Insuficiente');</script>";
                            echo "<script>window.location = '/venda/orcamento';</script>";
                            die();

                            /*NAO SALVA VENDA*/

                        } else {
                            echo('ESTOQUE MAIOR');
                            echo('<br>');
                            /*SALVAR VENDA*/
                            $cont = 0;
                            while ($cont < count($desconto)) {
                                $itens = new Itensv();
                                $itens->idvenda = $orcamento->idvenda;
                                $itens->idproduto = $produto[$cont];
                                $itens->desconto = $orcamento->desconto[$cont];
                                $itens->quantidade = $quantidade[$cont];
                                $itens->desconto = $desconto[$cont];
                                $itens->maodeobra = $maodeobra[$cont];
                                $itens->valorUnitario = $valorUnitario[$cont];
                                $itens->status = 'orcamento';
                                $itens->valorTotal = $valorTotal[$cont] = ($valorUnitario[$cont] * $quantidade[$cont]) + $maodeobra[$cont] - $desconto[$cont];;

                                $itens->save();
                                $cont = $cont + 1;
                            }
                        }

                    }

                    DB::commit();


                } else {
                    DB::rollback();
                }


                return Redirect::to('venda/orcamento');
            } else {
                echo "<script>alert('Escolha o Status da venda ou Orcamento');</script>";
                echo "<script>window.location = '/venda/orcamento';</script>";

            }
        } else {
            echo '<script>alert("Para Realizar uma Venda o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
            echo '<script>window.location="/caixa/create"</script>';
            exit;
        }
    }

    public function show($id)
    {

        $venda = DB::table('venda as v')
            ->join('itensv as i', 'i.idvenda', '=', 'v.idvenda')
            ->join('produto as pro', 'pro.idproduto', '=', 'i.idproduto')
            ->join('funcionario as fun', 'fun.idfuncionario', '=', 'v.idfuncionario')
            ->join('cliente as cli', 'cli.idcliente', '=',
                'v.idcliente')
            ->select('fun.idfuncionario', 'cli.idcliente', 'cli.nomeCliente', 'v.dataVenda', 'fun.nomeFuncionario', 'fun.nomeFuncionario', 'v.status', 'pro.modelo', 'pro.unidadeMedida', 'v.idvenda', 'i.quantidade', 'i.valorUnitario', 'i.valorTotal', DB::raw('sum((i.quantidade*i.valorUnitario))as total'))
            ->where('v.idvenda', '=', $id)
            ->groupBy('i.iditensv', 'fun.idfuncionario', 'cli.idcliente', 'v.dataVenda', 'fun.nomeFuncionario', 'cli.nomeCliente', 'pro.modelo', 'pro.unidadeMedida', 'i.quantidade', 'i.valorUnitario', 'i.valorTotal', 'v.status', 'v.idvenda')
            ->first();

        $itens = DB::table('itensv as i')
            ->join('produto as pro', 'pro.idproduto', '=', 'i.idproduto')
            ->join('venda as v', 'i.idvenda', '=', 'v.idvenda')
            ->select('i.iditensv', 'pro.idproduto', 'pro.modelo', 'pro.unidadeMedida', 'i.quantidade', 'i.valorUnitario', 'i.valorTotal', 'v.idvenda', 'i.maodeobra', 'i.desconto')
            ->where('i.idvenda', '=', $id)
            ->groupBy('i.iditensv', 'pro.idproduto', 'pro.modelo', 'pro.unidadeMedida', 'i.quantidade', 'i.valorUnitario', 'i.valorTotal', 'v.idvenda', 'i.maodeobra', 'i.desconto')
            ->get();


        return view("venda/orcamento.show",
            ["venda" => $venda, "itens" => $itens]);

    }

    public function destroy($id)
    {
        $orcamento = venda::findOrFail($id);

        $orcamento->status = 'Cancelado';

        //$itensv->delete();
        $orcamento->update();

        return Redirect::to('venda/orcamento');
    }
}

