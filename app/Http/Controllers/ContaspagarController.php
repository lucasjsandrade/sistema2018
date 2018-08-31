<?php

namespace sistemaLaravel\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Response;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\Http\Requests\ContaspagarFormRequest;


class ContaspagarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $contas = DB::table('contaspagar as c')
                ->join('compra as com', 'com.idcompra', '=',
                    'c.idcompra')
                ->join('fornecedor as f', 'f.idfornecedor', '=',
                    'c.idfornecedor')
                ->join('parcelapagar as p','p.idcontasp','c.idcontasp')
                ->select('com.idcompra', 'f.idfornecedor', 'com.numeroDeParcelas', 'c.idcontasp', 'c.data', 'c.descricao', 'c.valor','p.idcontasp','p.status')

                ->where('c.idcontasp', 'LIKE', '%' . $query . '%', 'or', 'is null')
                ->where('p.status','=','Pendente')
                ->orderBy('c.idcontasp', 'desc')
                ->groupBy('com.idcompra', 'f.idfornecedor', 'com.numeroDeParcelas', 'c.idcontasp', 'c.data', 'c.descricao', 'c.valor','p.idcontasp','p.status')
                ->paginate(7);
            return view('contaspagar.index', [
                "contaspagar" => $contas, "searchText" => $query
            ]);
        }
    }

    public function show($id)
    {


        $contaspagar = DB::table('contaspagar as cp')
            ->join('parcelapagar as parc', 'parc.idcontasp', '=', 'cp.idcontasp')
            ->join('compra as c ', 'c.idcompra', '=', 'cp.idcompra')
            ->select('cp.idcontasp', 'cp.data', 'cp.valor', 'parc.idparcela', 'parc.dataVencimento', 'parc.idcontasp', 'cp.descricao', 'cp.idcompra', 'cp.parcela')
            ->where('cp.idcontasp', '=', $id)
            ->groupBy('cp.idcontasp', 'cp.data', 'cp.valor', 'parc.idparcela', 'parc.dataVencimento', 'parc.idcontasp', 'cp.descricao', 'cp.idcompra', 'cp.parcela')
            ->first();


        $parcelapagar = DB::table('parcelapagar as parc')
            ->join('contaspagar as cp', 'cp.idcontasp', '=', 'parc.idcontasp')
            ->select('parc.idparcela', 'parc.dataVencimento', 'valorParcela', 'parc.idcontasp','parc.status')
            ->where('cp.idcontasp', '=', $id)
            ->where('parc.status', '=', 'pendente')
            ->groupBy('parc.idparcela', 'parc.dataVencimento', 'valorParcela', 'parc.idcontasp','parc.status')
            ->get();


        return view("contaspagar.show",
            ["contaspagar" => $contaspagar, "parcelapagar" => $parcelapagar]);
    }




}

