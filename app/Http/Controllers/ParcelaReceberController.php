<?php
namespace sistemaLaravel\Http\Controllers;
use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use Response;
use DB;
class ParcelaReceberController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function  get($id){
        $dadosparcela=DB::table('parcelareceber as parc')
            ->join('contasreceber as cr', 'cr.idcontasr','=','parc.idcontasr')
            ->select('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorRecebido','parc.idcontasr','parc.status')
            ->where('parc.idparcela', '=',$id)
            ->where('parc.status', '=','Pendente')
            ->groupBy('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorRecebido','parc.idcontasr','parc.status')
            ->get();
        return Response::json($dadosparcela);
    }
    public function show($id)
    {
        $parcelareceber=DB::table('parcelareceber as parc')
            ->join('contasreceber as cr', 'cr.idcontasr','=','parc.idcontasr')
            ->select('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorRecebido','parc.idcontasr')
            ->where('cr.idcontasr', '=',$id)
            ->where('parc.status', '=','Pendente')
            ->groupBy('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorRecebido','parc.idcontasr')
            ->get();
        return Response::json($parcelareceber);
    }
}
