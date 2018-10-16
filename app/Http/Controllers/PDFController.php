<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use PDF;
use DB;
use sistemaLaravel\Cliente;
use sistemaLaravel\Produto;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getPDF(){

        $clientes=Cliente::all();
        $pdf=PDF::loadView('pdf.cliente',['cliente'=>$clientes]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('cliente.pdf',['cliente'=>$clientes]);


    }

    public function ProdutoGetPDF(){

        $produtos = DB::table('produto as p')
            ->join('categoria as c', 'c.idcategoria', '=',
                'p.idcategoria')

            ->select('p.idproduto', 'p.modelo','p.quantidade', 'p.status','c.nome', DB::raw('count(p.idproduto)as total'),DB::raw('sum(p.quantidade)as estoque'))
            ->orderBy('p.idproduto', 'asc')
            ->groupBy('p.idproduto', 'p.modelo','p.quantidade', 'p.status','c.nome')
            ->paginate(10);


        $pdf=PDF::loadView('pdf.produto',['produto'=>$produtos]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('produto.pdf',['produto'=>$produtos]);


    }


}

