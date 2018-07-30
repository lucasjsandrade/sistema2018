<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use sistemaLaravel\Caixa;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CaixaFormRequest;
use sistemaLaravel\MovimentacaoCaixa;
use Carbon\Carbon;
use Response;
use DB;
use Illuminate\Support\Collection;

class CaixaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {


        if ($request) {
            $query = trim($request->get('searchText'));
            $caixa = DB::table('caixa as c')
                ->select('c.idcaixa', 'c.data',
                    'c.saldoInicial', 'c.saldoFinal', 'c.diferenca', 'c.situacao')
                ->where('c.idcaixa', 'LIKE', '%' . $query . '%')
                ->where('c.idcaixa', '>', 0)
                ->select('c.idcaixa', 'c.data',
                    'c.saldoInicial', 'c.saldoFinal', 'c.diferenca', 'c.situacao')
                ->orderBy('idcaixa', 'desc')
                ->paginate(10);
            return view('caixa.index', [
                "caixa" => $caixa, "searchText" => $query
            ]);

        }


    }

    public function create()
    {

        $caixa = DB::table('caixa')
            ->get();

        return view("caixa.create");


    }


    public function store(CaixaFormRequest $request)
    {

        $caixa = new Caixa;
        $caixa->saldoInicial = $request->get('saldoInicial');
        $caixa->situacao = 'Aberto';
        $mytime = Carbon::now('America/Sao_Paulo');
        $caixa->data = $mytime->toDateTimeString();



        $valor = $request->get('saldoInicial');
        if ($caixa):
            setcookie("caixa", "aberto", time() + (730 * 24 * 3600));
            $cook_abrir = $_COOKIE['caixa'] = 'ABERTO';
            $movimento = new movimentacaocaixa();
            $movimento->idcaixa = $caixa;
            //$data = Carbon::now('America/Sao_Paulo');
            //$movimento->data = $data->toDateTimeString();
            $movimento->descricao = 'Abertura';
            $movimento->valor = $valor;
            $movimento->tipoMovimentacao = 'Movimento';
            $caixa->save();
            $movimento->save();
            echo '<script>alert("Abertura Realizada com Sucesso!")</script>';
            echo '<script>window.location="caixa"</script>';
        else:
            echo '<script>alert("Ocorreu um erro na abertura do Caixa!")</script>';
            echo '<script>window.location="caixa/create"</script>';
        endif;


    }


    public function show($id)
    {
        $caixa = DB::table('caixa as cai')
            ->select('cai.idcaixa', 'cai.data', 'cai.saldoInicial', 'cai.saldoFinal', 'cai.diferenca', 'cai.situacao')
            ->groupBy('cai.idcaixa', 'cai.data', 'cai.saldoInicial', 'cai.saldoFinal', 'cai.diferenca', 'cai.situacao')
            ->where('cai.idcaixa', '=', $id)
            ->first();

        $movimentacaocaixa = DB::table('movimentacaocaixa as mov')
            ->join('caixa as cai', 'mov.idcaixa', '=', 'cai.idcaixa')
            ->select('mov.idmovimentacao', 'mov.descricao', 'mov.data', 'mov.tipoMovimentacao', 'mov.valor', 'mov.idpagamento', 'mov.idrecebimento')
            ->where('cai.idcaixa', '=', $id)
            ->get();

        return view("caixa.show", ["caixa" => $caixa, "movimentacaocaixa" => $movimentacaocaixa]);


    }

    public function close()
    {
        try {

            if ($_COOKIE['caixa'] == 'aberto') {
                DB::table('caixa')->update(['situacao' => 'Fechado']);
                setcookie("caixa");

                echo '<script> alert("Caixa encerrado com Sucesso!");</script>';
                echo '<script>window.location="caixa"</script>';
                //fecha o caixa
            }
        } catch (\Exception $Exception) {
            echo '<script>alert("Não Existe Caixa para ser Fechado!")</script>';
            unset($_COOKIE['caixa']);
            echo '<script>window.location="/caixa"</script>';
        }


    }


    public function destroy()
    {

        echo('aqui');
        die();


    }


}


