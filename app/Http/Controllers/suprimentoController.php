<?php

namespace sistemaLaravel\Http\Controllers;
use Carbon\Carbon;
use DB;
use Response;
use sistemaLaravel\Caixa;
use sistemaLaravel\MovimentacaoCaixa;
use sistemaLaravel\Http\requests\suprimentoFormRequest;

class suprimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create()
    {

        $caixa = DB::table('caixa')
            ->get();

        return view("suprimento.create");


    }


    public function store(suprimentoFormRequest $request)
    {
        global $last_id;
        $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();//consulta a ultima trazacao do caixa

     $valorSuprimento = $request->get('sangria');

        if ($valorSuprimento <= $last_id->saldoAtual) {
            $movimento = new movimentacaocaixa();
            $movimento->idcaixa = $last_id->idcaixa;
            $data = Carbon::now('America/Sao_Paulo');
            $movimento->data = $data->toDateTimeString();
            $movimento->descricao = $request->get('descricao');
            $movimento->valor = $request->get('suprimento');
            $movimento->tipoMovimentacao = 'Suprimento';
            $movimento->idrecebimento = 0;
            $movimento->idpagamento = 0;
            $movimento->save();

            $caixa = Caixa::findOrFail($last_id->idcaixa);
            $caixa->saldoAtual = $caixa->saldoAtual + $movimento->valor;
            $caixa->update();//atualiza o saldo Atual do caixa



            DB::commit();
        }
        else{
            echo '<script>alert("O Valor da Sangria não deve ser maior que o saldo do Caixa!")</script>';
            echo '<script>window.location="caixa"</script>';


        }

        return \redirect('\caixa');
    }










}