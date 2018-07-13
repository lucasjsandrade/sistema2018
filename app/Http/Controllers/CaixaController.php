<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Caixa;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CaixaFormRequest;
use DB;
use Carbon\Carbon;
use Response;
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
                ->join('movimentacaoCaixa as mov', 'mov.idmovimentacaoCaixa', '=',
                    'c.idmovimentacaoCaixa')
                ->select('c.idcaixa', 'c.data',
                    'c.saldoInicial', 'c.saldoFinal', 'c.diferenca', 'c.situacao', 'mov.descricao', 'mov.data', 'mov.tipoMovimentacao', 'mov.valor')
                ->where('c.idcaixa', 'LIKE', '%' . $query . '%')
                ->where('c.idcaixa', '>', 0)
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

    /**
     * @param CaixaFormRequest $request
     * @return mixed
     */
    public function store(CaixaFormRequest $request)
    {

        $caixa = new Caixa;
        $caixa->saldoInicial = $request->get('saldoInicial');

        $mytime = Carbon::now('America/Sao_Paulo');
        $caixa->data=$mytime->toDateTimeString();


        $caixa->save();
        if ($caixa):
            //$request->session()->put('nome', 'Valor');
            //session_start();
            //$_SESSION['caixa'] = 'aberto';
            setcookie("caixa","aberto",time()+(7*24*3600));
            $cook_abrir = $_COOKIE['caixa'] = 'ABERTO';

            echo '<script>alert("Abertura Realizada com Sucesso!")</script>';
            echo'<script>window.location="caixa"</script>';
            else:
            echo '<script>alert("Ocorreu um erro na abertura do Caixa!")</script>';
            echo'<script>window.location="caixa/create"</script>';
        endif;


        }

    public function show()
    {

        $caixa = DB::table('caixa')
            ->get();

        return view("caixa.show");


    }

    public function destroy ()
    {

    echo ('aqui');
    die();


    }


}