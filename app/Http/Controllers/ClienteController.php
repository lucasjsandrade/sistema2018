<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Cliente;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\ClienteFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class ClienteController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){

    if($request){
      $query=trim($request->get('searchText'));
      $cliente=DB::table('cliente as c')
      ->join('cidade as cid', 'cid.idcidade', '=', 
        'c.idcidade')
      ->select('c.nomeCliente','c.idcliente','c.logradouro','c.numero','c.dataNascimento','c.dataCadastro','c.status','cid.idcidade','cid.nomeCidade as cidade')

      ->where('c.nomeCliente', 'LIKE', '%'.$query.'%')



      ->orderBy('idcliente','desc')
      ->paginate(10);
      return view('pessoa.cliente.index', [
        "cliente"=>$cliente, "searchText"=>$query
      ]);
    }
  }

  public function create(){
    $cidade=DB::table('cidade')

    ->get();

    return view("pessoa.cliente.create",
      ["cidade"=>$cidade]);


  }

  public function store(ClienteFormRequest $request){
    try{
      $cliente = new Cliente;
      $cliente->idcidade=$request->get('idcidade');
      $cliente->nomeCliente=$request->get('nomeCliente');
      $cliente->rg=$request->get('rg');
      $cliente->cpf=$request->get('cpf');
      $cliente->sexo=$request->get('sexo');
      $cliente->telefone=$request->get('telefone');
      $cliente->celular=$request->get('celular');
      $cliente->whatsapp=$request->get('whatsapp');
      $cliente->email=$request->get('email');
      $cliente->logradouro=$request->get('logradouro');
      $cliente->numero=$request->get('numero');
      $cliente->bairro=$request->get('bairro');
      $cliente->cep=$request->get('cep');
      $mytime = Carbon::now('America/Sao_Paulo'); 
      $cliente->dataCadastro=$mytime->toDateTimeString();
      $cliente->dataNascimento=$request->get('dataNascimento');
      $cliente->status='Ativo';

      $cliente->save();
      return Redirect::to('pessoa/cliente');
    }


    catch(\Exception $Exception){
      DB::rollback();
      echo "<script>alert('Já existe um este CPF/RG inserido cadastrado para um Cliente!');</script>"; 



      echo "<script>window.location = '/pessoa/cliente';</script>";
    }


  }

  public function show($id){
    return view("pessoa.cliente.show", 
      ["cliente"=>Cliente::findOrFail($id)]);
  }

  public function edit($id){
   $cliente = Cliente::findOrFail($id);
   $cidade  = DB::table('cidade')
   ->get();
   return view("pessoa.cliente.edit", 
    ["cliente"=>$cliente,"cidade"=>$cidade]);
 }

 public function update(ClienteFormRequest $request, $id){
  try{
    $cliente=Cliente::findOrFail($id);
    $cliente->idcidade=$request->get('idcidade');
    $cliente->nomeCliente=$request->get('nomeCliente');
    $cliente->rg=$request->get('rg');
    $cliente->cpf=$request->get('cpf');
    $cliente->sexo=$request->get('sexo');
    $cliente->telefone=$request->get('telefone');
    $cliente->celular=$request->get('celular');
    $cliente->whatsapp=$request->get('whatsapp');
    $cliente->email=$request->get('email');
    $cliente->logradouro=$request->get('logradouro');
    $cliente->numero=$request->get('numero');
    $cliente->bairro=$request->get('bairro');
    $cliente->dataNascimento=$request->get('dataNascimento'); 

    $cliente->update();
    return Redirect::to('pessoa/cliente');

  }

  catch(\Exception $Exception){
    DB::rollback();
    echo "<script>alert('Já existe um este CPF/RG inserido cadastrado para um Cliente!');</script>"; 



    echo "<script>window.location = '/pessoa/cliente';</script>";
  }



}


public function destroy($id){
  try{
    $cliente=Cliente::findOrFail($id);
    $cliente->delete();
    $cliente->update();
    return Redirect::to('pessoa/cliente');
  }
  catch(\Exception $Exception){
    DB::rollback();
    echo "<script>alert('Não é possivel Excluir um Cadastro em uso!');</script>"; 



    echo "<script>window.location = '/pessoa/cliente';</script>";
  }
}
}
