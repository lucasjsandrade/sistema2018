<?php

namespace sistemaLaravel\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Response;
use sistemaLaravel\Caixa;
use sistemaLaravel\Http\Requests\CaixaFormRequest;
use sistemaLaravel\MovimentacaoCaixa;
use Auth;




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
                    'c.saldoInicial', 'c.saldoAtual', 'c.saldoFinal', 'c.situacao')
                ->where('c.idcaixa', 'LIKE', '%' . $query . '%')
                ->where('c.idcaixa', '>', 0)
                ->where('c.idcaixa', '>', 0)
                ->select('c.idcaixa', 'c.data',
                    'c.saldoInicial', 'c.saldoAtual', 'c.saldoFinal', 'c.situacao')
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
        $caixa->saldoAtual = $request->get('saldoInicial');
        $caixa->situacao = 'Aberto';
        $caixa->id = $request->get('idusuario');
        $mytime = Carbon::now('America/Sao_Paulo');
        $caixa->data = $mytime->toDateTimeString();
        $caixa->save();


        $valor = $request->get('saldoInicial');
        if ($caixa):
            //setcookie("caixa", "aberto", time() + (730 * 24 * 3600));

            $movimento = new movimentacaocaixa();
            $movimento->idcaixa = $caixa->idcaixa;
            $data = Carbon::now('America/Sao_Paulo');
            $movimento->data = $data->toDateTimeString();
            $movimento->descricao = $request->get('descricao');
            $movimento->valor = $valor;
            $movimento->tipoMovimentacao = 'Abertura';
            $movimento->idrecebimento = 0;
            $movimento->idpagamento = 0;
            $movimento->save();
            DB::commit();
            echo '<script>alert("Abertura Realizada com Sucesso!")</script>';
            echo '<script>window.location="caixa"</script>';
        else:
            echo '<script>alert("Ocorreu um erro na abertura do Caixa!")</script>';
            DB::rollback();
            echo '<script>window.location="caixa/create"</script>';
        endif;


    }


    public function show($id)
    {
        $caixa = DB::table('caixa as cai')
            ->join('users as usu','usu.id','=','cai.id')
            ->select('cai.idcaixa', 'cai.data', 'cai.saldoInicial', 'cai.saldoAtual', 'cai.saldoFinal', 'cai.situacao','usu.id','usu.name')
            ->groupBy('cai.idcaixa', 'cai.data', 'cai.saldoInicial', 'cai.saldoAtual', 'cai.saldoFinal', 'cai.situacao','usu.id','usu.name')
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

        $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();
        $idusuario = Auth::user()->id;

        try {

        if ($last_id->situacao == "Aberto") {
            if($last_id->id == $idusuario) {
                DB::table('caixa')->update(['situacao' => 'Fechado']);
                $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();
                $caixa = Caixa::findOrFail($last_id->idcaixa);
                $caixa->saldoFInal = $caixa->saldoAtual;
                $caixa->update();
                echo '<script> alert("Caixa encerrado com Sucesso!");</script>';
                echo '<script>window.location="caixa"</script>';
                //fecha o caixa
                exit;
            }
            else{
                echo '<script> alert("Caixa deve ser fechado pelo Usuario que realizou a abertura! ID_USUARIO: '.$idusuario.'");</script>';
                echo '<script>window.location="caixa"</script>';
                exit;
            }
        }
        else{
            echo '<script>alert("Não Existe Caixa para ser Fechado!")</script>';
            echo '<script>window.location="/caixa"</script>';

        }

        } catch (\Exception $Exception) {

        }


    }


}