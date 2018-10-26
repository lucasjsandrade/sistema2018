<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use PDF;
use DB;
use sistemaLaravel\Cliente;
use sistemaLaravel\Produto;
use sistemaLaravel\Compra;
use sistemaLaravel\Venda;
use sistemaLaravel\Caixa;
use sistemaLaravel\Pagamento;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\CompraPDFFormRequest;
use Illuminate\Support\Facades\Input;

class PDFController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getPDF()
    {

        $clientes = Cliente::all();
        $pdf = PDF::loadView('pdf.cliente', ['cliente' => $clientes]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('cliente.pdf', ['cliente' => $clientes]);


    }

    public function ProdutoGetPDF()
    {

        $produtos = DB::table('produto as p')
            ->join('categoria as c', 'c.idcategoria', '=',
                'p.idcategoria')
            ->select('p.idproduto', 'p.modelo', 'p.quantidade', 'p.status', 'c.nome', DB::raw('count(p.idproduto)as total'), DB::raw('sum(p.quantidade)as estoque'))
            ->orderBy('p.idproduto', 'asc')
            ->groupBy('p.idproduto', 'p.modelo', 'p.quantidade', 'p.status', 'c.nome')
            ->paginate(10);


        $pdf = PDF::loadView('pdf.produto', ['produto' => $produtos]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('produto.pdf', ['produto' => $produtos]);


    }

    public function CompraIndex(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $compra = DB::table('compra as c')
                ->join('itensc as itens', 'itens.idcompra', '=', 'c.idcompra')
                ->join('produto as pro', 'itens.idproduto', '=', 'pro.idproduto')
                ->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')
                ->join('funcionario as func', 'func.idfuncionario', '=', 'c.idfuncionario')
                ->select('c.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia', 'c.dataCompra', 'c.status', 'c.totalCompra')
                ->orderBy('c.idcompra', 'desc')
                ->groupBy('c.idcompra', 'func.nomeFuncionario', 'for.nomeFantasia', 'c.dataCompra', 'c.status', 'c.totalCompra')
                ->where('c.status', '=', 'Fechado')
                ->where('c.idcompra', 'LIKE', '%' . $query . '%')
                ->paginate(7);

            return view('pdf.compraIndex', [
                "compra" => $compra, "searchText" => $query
            ]);
        }
    }

    public function CompraGetPDF()
    {
        $dataInicial = Input::get('dataInicial');
        $dataFinal = Input::get('dataFinal');
        $condicaoPagamento = Input::get('condicaoPagamento');


        if ($condicaoPagamento != 'T') {
            $compra = Compra::whereBetween('dataCompra', [$dataInicial, $dataFinal])
                ->whereBetween('condicaoPagamento', [$condicaoPagamento, $condicaoPagamento])
                ->orderBy('idcompra')
                ->get();
        } else {
            $compra = Compra::whereBetween('dataCompra', [$dataInicial, $dataFinal])
                ->orderBy('idcompra')
                ->get();
        }


        $pdf = PDF::loadView('pdf.compra', ['compra' => $compra]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('compra.pdf', ['compra' => $compra]);

    }

    public function VendaIndex(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $venda = DB::table('venda as v')
                ->join('itensv as itens', 'itens.idvenda', '=', 'v.idvenda')
                ->join('produto as pro', 'itens.idproduto', '=', 'pro.idproduto')
                ->join('cliente as cli', 'cli.idcliente', '=', 'v.idcliente')
                ->join('funcionario as func', 'func.idfuncionario', '=', 'v.idfuncionario')
                ->select('v.idvenda', 'func.nomeFuncionario', 'cli.nomeCliente', 'v.dataVenda', 'v.status', 'v.valorTotal')
                ->orderBy('v.idvenda', 'desc')
                ->groupBy('v.idvenda', 'func.nomeFuncionario', 'cli.nomeCliente', 'v.dataVenda', 'v.status', 'v.valorTotal')
                ->where('v.status', '=', 'Fechado')
                ->where('v.idvenda', 'LIKE', '%' . $query . '%')
                ->paginate(7);

            return view('pdf.VendaIndex', [
                "venda" => $venda, "searchText" => $query
            ]);
        }
    }

    public function VendaGetPDF()
    {


        $dataInicial = Input::get('dataInicial');
        $dataFinal = Input::get('dataFinal');
        $dataFinal = Input::get('dataFinal');
        $condicaoPagamento = Input::get('condicaoPagamento');


        if ($condicaoPagamento != 'T') {
            $venda = Venda::whereBetween('dataVenda', [$dataInicial, $dataFinal])
                ->whereBetween('condicaoPagamento', [$condicaoPagamento, $condicaoPagamento])
                ->orderBy('idvenda')
                ->get();
        } else {
            $venda = Venda::whereBetween('dataVenda', [$dataInicial, $dataFinal])
                ->orderBy('idvenda')
                ->get();
        }


        $pdf = PDF::loadView('pdf.venda', ['venda' => $venda]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('venda.pdf', ['venda' => $venda]);

    }

    public function CaixaIndex(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $caixa = DB::table('caixa as c')
                ->select('c.idcaixa', 'c.data', 'c.saldoInicial', 'c.saldoAtual', 'c.saldoFinal', 'c.situacao')
                ->where('c.situacao', '=', 'Fechado')
                ->get();

            return view('pdf.CaixaIndex', [
                "caixa" => $caixa, "searchText" => $query
            ]);
        }
    }

    public function CaixaGetPDF()
    {

        $dataInicial = Input::get('dataInicial');
        $dataFinal = Input::get('dataFinal');

        $caixa = DB::table('caixa as c')
            ->whereBetween('data', [$dataInicial, $dataFinal])
            ->where('c.situacao', '=', 'Fechado')
            ->orderBy('idcaixa')
            ->get();

        $pdf = PDF::loadView('pdf.caixa', ['caixa' => $caixa]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('caixa.pdf', ['caixa' => $caixa]);

    }

    public function PagamentoIndex(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $pagamento = DB::table('pagamento as p')
                ->select('p.idpagamento')
                ->get();
            $fornecedor = DB::table('fornecedor')
                ->where('status', '=', 'Ativo')
                ->get();

            return view('pdf.PagamentoIndex', [
                "pagamento" => $pagamento, "fornecedor" => $fornecedor, "searchText" => $query
            ]);
        }
    }

    public function PagamentoGetPDF()
    {

        $dataInicial = Input::get('dataInicial');
        $dataFinal = Input::get('dataFinal');
        $fornecedor = Input::get('idfornecedor');
        if ($fornecedor != 'T') {
            $pagamento = DB::table('pagamento as p')
                ->join('parcelapagar as pa', 'pa.idparcela', '=', 'p.idparcelap')
                ->join('contaspagar as c', 'c.idcontasp', '=', 'pa.idcontasp')
                ->join('compra as com', 'c.idcompra', '=', 'com.idcompra')
                ->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')
                ->select('p.data', 'pa.valorParcela', 'pa.valorPago', 'pa.status', 'pa.idparcela', 'p.idpagamento', 'pa.idcontasp', 'c.parcela', 'for.idfornecedor',
                    'for.razaoSocial', 'for.telefone', 'com.idcompra', 'com.totalCompra', 'com.numeroDeParcelas')
                ->whereBetween('p.data', [$dataInicial, $dataFinal])
                ->whereBetween('for.idfornecedor', [$fornecedor, $fornecedor])
                ->orderBy('idpagamento')
                ->get();
        } else {

            $pagamento = DB::table('pagamento as p')
                ->join('parcelapagar as pa', 'pa.idparcela', '=', 'p.idparcelap')
                ->join('contaspagar as c', 'c.idcontasp', '=', 'pa.idcontasp')
                ->join('compra as com', 'c.idcompra', '=', 'com.idcompra')
                ->join('fornecedor as for', 'for.idfornecedor', '=', 'c.idfornecedor')
                ->select('p.data', 'pa.valorParcela', 'pa.valorPago', 'pa.status', 'pa.idparcela', 'p.idpagamento', 'pa.idcontasp', 'c.parcela', 'for.idfornecedor',
                    'for.razaoSocial', 'for.telefone', 'com.idcompra', 'com.totalCompra', 'com.numeroDeParcelas')
                ->whereBetween('p.data', [$dataInicial, $dataFinal])
                ->orderBy('p.idpagamento')
                ->get();

        }
        $pdf = PDF::loadView('pdf.pagamento', ['pagamento' => $pagamento]);
        //return $pdf->download('customer.pdf');
        return $pdf->stream('caixa.pdf', ['pagamento' => $pagamento]);

    }


}

