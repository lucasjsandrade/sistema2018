<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;
use sistemaLaravel\pagamento;
use sistemaLaravel\parcelap;
use sistemaLaravel\Contaspagar;
use sistemaLaravel\ParcelaPagar;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\PagamentoFormRequest;
use sistemaLaravel\Http\requests\ContaspagarFormRequest;
use sistemaLaravel\Http\requests\ContasReceberFormRequest;
use Carbon\Carbon;
use Response;
use DB;


class PagamentoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');


    }


    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $pagamento=DB::table('pagamento as pag')

                //->join('parcelapagar as par','par.idcontasp', '=', 'con.idcontasp')



                ->select('pag.idpagamento')

                ->orderBy('pag.idpagamento', 'desc')


                ->where('pag.idpagamento','LIKE', '%'.$query.'%')

                ->paginate(7);

            return view('pagamento.index', [
                "pagamento"=>$pagamento, "searchText"=>$query
            ]);
        }
    }




}
