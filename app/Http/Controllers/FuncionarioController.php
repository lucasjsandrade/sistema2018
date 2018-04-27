<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Funcionario;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\FuncionarioFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class FuncionarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }


  public function index(Request $request){

    if($request){
      $query=trim($request->get('searchText'));
      $funcionario=DB::table('funcionario as f')
      ->join('cidade as cid', 'cid.idcidade', '=', 'f.idcidade')        
      ->select('f.idfuncionario','f.nomeFuncionario', 'f.rg', 'f.cpf', 'f.logradouro','f.dataNascimento','f.status','f.dataCadastro','f.numero', 'cid.nomeCidade as cidade', 'f.telefone', 'f.celular')
      ->where('f.nomeFuncionario','LIKE', '%'.$query.'%')
      
      ->orderBy('idfuncionario','desc')
      ->paginate(10);
      return view('pessoa.funcionario.index', [
        "funcionario"=>$funcionario, "searchText"=>$query
      ]);
    }
  }

  public function create(){

    $cidade=DB::table('cidade')
    ->get();
    
    return view("pessoa.funcionario.create",
      ["cidade"=>$cidade]);
  }

  
  
  public function store(FuncionarioFormRequest $request){
    try{
      $funcionario = new Funcionario;
      $funcionario->idcidade=$request->get('idcidade');
      $funcionario->nomeFuncionario=$request->get('nomeFuncionario');
      $funcionario->rg=$request->get('rg'); 
      $funcionario->cpf=$request->get('cpf');   
      $funcionario->sexo=$request->get('sexo');   
      $funcionario->telefone=$request->get('telefone');   
      $funcionario->celular=$request->get('celular');       
      $funcionario->whatsapp=$request->get('whatsapp');   
      $funcionario->email=$request->get('email');   
      $funcionario->logradouro=$request->get('logradouro');   
      $funcionario->numero=$request->get('numero');  
      $funcionario->bairro=$request->get('bairro');   
      $funcionario->cep=$request->get('cep'); 
      $funcionario->status='Ativo';  
      $funcionario->dataNascimento=$request->get('dataNascimento'); 
      $mytime = Carbon::now('America/Sao_Paulo'); 
      $funcionario->dataCadastro=$mytime->toDateTimeString();
      $funcionario->save();

      return Redirect::to('pessoa/funcionario');
    }

      catch(\Exception $Exception){
      DB::rollback();
      echo "<script>alert('Já existe um CPF/RG cadastrado para este Funcionario!');</script>"; 



      echo "<script>window.location = '/pessoa/funcionario';</script>";
    }


  }     


  public function show($id){
    return view("pessoa.funcionario.show",
            ["funcionario"=>Funcionario::findOrFail($id)]);//findOrFail mostra a categoria baseada no ID | quando pedir para exibir ele vai abrir a categoria baseada no ID. Os colchetes são uma matriz que vai puxar as informações do metodo STORE.

  }

  public function edit($id){

    $funcionario = Funcionario::findOrFail($id);
    $cidade = DB::table('cidade')
    ->get();

    return view("pessoa.funcionario.edit",
      ["funcionario"=>$funcionario, "cidade"=>$cidade]);

  }

  public function update(FuncionarioFormRequest $request, $id){
    $funcionario = Funcionario::findOrFail($id);
    $funcionario->idcidade=$request->get('idcidade');
    $funcionario->nomeFuncionario=$request->get('nomeFuncionario');
    $funcionario->rg=$request->get('rg'); 
    $funcionario->cpf=$request->get('cpf');   
    $funcionario->sexo=$request->get('sexo');   
    $funcionario->telefone=$request->get('telefone');   
    $funcionario->celular=$request->get('celular');     
    $funcionario->whatsapp=$request->get('whatsapp');   
    $funcionario->email=$request->get('email');   
    $funcionario->logradouro=$request->get('logradouro');   
    $funcionario->numero=$request->get('numero');  
    $funcionario->bairro=$request->get('bairro');   
    $funcionario->cep=$request->get('cep');   
    $funcionario->dataNascimento=$request->get('dataNascimento'); 
    $funcionario->status=$request->get('status'); 

    $funcionario->update();
    return Redirect::to('pessoa/funcionario');
  }

  public function destroy($id){
    $funcionario=Funcionario::findOrFail($id);
      $funcionario->status='Inativo'; //Condição igual a zero pois a categoria vai ser inativa
      $funcionario->update();
      return Redirect::to('pessoa/funcionario');   
    }
  }
