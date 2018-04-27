<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\agendamento;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\agendamentoFormRequest;
use DB;
use Carbon\Carbon;
use Response;

class agendamentoController extends Controller
{
	public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){

    if($request){
      $query=trim($request->get('searchText'));

      $agendamento=DB::table('agendamento as agen')
      ->join('funcionario as func', 'func.idfuncionario', '=', 'agen.idfuncionario')
      ->join('cliente as cli', 'cli.idcliente', '=', 'agen.idcliente')        
      ->select('agen.idagendamento', 'func.nomeFuncionario as funcionario', 'cli.nomeCliente as cliente', 'cli.telefone', 'agen.dataLancamento', 'agen.dataOrcamento', 'agen.dataInstalacao','agen.horaMarcada','agen.status')
      ->where('func.nomeFuncionario','LIKE', '%'.$query.'%')
      ->orwhere('cli.nomeCliente','LIKE', '%'.$query.'%')
      ->orwhere('agen.status','LIKE', '%'.$query.'%')

      ->orderBy('idagendamento','desc')
      ->paginate(7);
      return view('venda.agendamento.index', [
        "agendamento"=>$agendamento, "searchText"=>$query
      ]);
    }
  }

  public function create(){
    $cliente=DB::table('cliente')
    ->where('status','=','Ativo')
    ->get();

    $funcionario=DB::table('funcionario')
    ->where('status','=','Ativo')
    ->get();

    return view("venda.agendamento.create",
     ["cliente"=>$cliente],["funcionario"=>$funcionario]);

  }

  public function store(agendamentoFormRequest $request){

   $agendamento = new agendamento;
   $agendamento->idcliente=$request->get('idcliente');
   $agendamento->idfuncionario=$request->get('idfuncionario');
   $agendamento->status=$request->get('status');
   $mytime = Carbon::now('America/Sao_Paulo'); 
   $agendamento->dataLancamento=$mytime->toDateTimeString();  






   $agendamento->dataOrcamento=$request->get('dataOrcamento'); 
   if(empty($agendamento->dataOrcamento)){
    $agendamento->dataOrcamento = NULL;
  } 
  $agendamento->dataInstalacao=$request->get('dataInstalacao'); 
  if(empty($agendamento->dataInstalacao)){
    $agendamento->dataInstalacao = NULL;
  } 


  if(empty($agendamento->dataOrcamento||$agendamento->dataInstalacao)){
    echo "<script>alert('Data instalaçao ou data data Orcamento devem ser preenchidas!');</script>";

    echo "<script>window.location = '/venda/agendamento/create';</script>"; 
    die();
  } 

  $agendamento->horaMarcada=$request->get('horaMarcada');
  if(empty($agendamento->horaMarcada)){
    $agendamento->horaMarcada = NULL;
    echo "<script>alert('Hora marcada deve ser preenchida!');</script>";

    echo "<script>window.location = '/venda/agendamento/create';</script>"; 
    die();
  } 
  

  $agendamento->save();
  return Redirect::to('venda/agendamento'); 

}

public function show($id){
  return view("venda.agendamento.show",
			["agendamento"=>agendamento::findOrFail($id)]);//findOrFail mostra a categoria baseada no ID | quando pedir para exibir ele vai abrir a categoria baseada no ID. Os colchetes são uma matriz que vai puxar as informações do metodo STORE.

}

public function edit($id){

 $agendamento = agendamento::findOrFail($id);
 $cliente = DB::table('cliente')
 ->where('status','=','Ativo')
 ->get();

 $funcionario = DB::table('funcionario')
 ->where('status','=','Ativo')
 ->get();

 return view("venda.agendamento.edit",
  ["agendamento"=>$agendamento, "cliente"=>$cliente, "funcionario"=>$funcionario]);

}

public function update(agendamentoFormRequest $request, $id){

 $agendamento=agendamento::findOrFail($id);
 $agendamento->idcliente=$request->get('idcliente');
 $agendamento->idfuncionario=$request->get('idfuncionario');
 $agendamento->status=$request->get('status');
 $mytime = Carbon::now('America/Sao_Paulo'); 
 $agendamento->dataLancamento=$mytime->toDateTimeString(); 

 $agendamento->dataOrcamento=$request->get('dataOrcamento'); 
 if(empty($agendamento->dataOrcamento)){
  $agendamento->dataOrcamento = NULL;

}  


$agendamento->dataInstalacao=$request->get('dataInstalacao');
if(empty($agendamento->dataInstalacao)){
  $agendamento->dataInstalacao = NULL;
} 


$agendamento->horaMarcada=$request->get('horaMarcada');
if(empty($agendamento->horaMarcada)){
  $agendamento->horaMarcada = NULL;
} 

$agendamento->update();
return Redirect::to('venda/agendamento');
}


public function destroy($id){

  try{

   $agendamento=agendamento::findOrFail($id); 
   $agendamento->delete();
   $agendamento->update();


 }

 catch (Exception $e){

   $agendamento->status='Cancelado'; 
   $agendamento->update();

 }
 return Redirect::to('venda/agendamento');
}


}



