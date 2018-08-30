<?php

namespace sistemaLaravel\Http\Controllers;

use sistemaLaravel\Contasreceber;
use Response;
use DB;

class ParcelaReceberController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }  //

public function  get($id){
    $dadosparcela=DB::table('parcelareceber as parc')

        ->join('contaspagar as cp', 'cp.idcontasp','=','parc.idcontasp')
        ->select('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorPago','parc.idcontasp','parc.status')
        ->where('parc.idparcela', '=',$id)
        ->get();



    return Response::json($dadosparcela);
}


    public function show($id)
    {

        $parcelareceber=DB::table('parcelareceber as parc')

            ->join('contasreceber as cr', 'cr.idcontasr','=','parc.idcontasr')
            ->select('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorRecebido','parc.idcontasr','parc.status')
            ->where('cr.idcontasr', '=',$id)
            ->get();



        return Response::json($parcelareceber);

    }


}
