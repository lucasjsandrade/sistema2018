<?php

namespace sistemaLaravel\Http\Controllers;

use sistemaLaravel\Contaspagar;
use Response;
use DB;

class ParcelapagarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }  //

public function  get($id){
    $dadosparcela=DB::table('parcelapagar as parc')

        ->join('contaspagar as cp', 'cp.idcontasp','=','parc.idcontasp')
        ->select('parc.idparcela','parc.dataVencimento','parc.valorParcela','parc.valorPago','parc.idcontasp','parc.status')
        ->where('parc.idparcela', '=',$id)
        ->get();



    return Response::json($dadosparcela);
}


    public function show($id)
    {

        $parcelapagar=DB::table('parcelapagar as parc')

            ->join('contaspagar as cp', 'cp.idcontasp','=','parc.idcontasp')
            ->select('parc.idparcela','parc.dataVencimento','valorParcela','valorPago','parc.idcontasp')
            ->where('cp.idcontasp', '=',$id)
            ->get();



        return Response::json($parcelapagar);

    }


}
