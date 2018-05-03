<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Cidade;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CidadeFormRequest;
use Illuminate\Support\Collection;
use Exception;
use DB;



class CidadeController extends Controller
{
 public function __construct(){
  $this->middleware('auth');
}

public function index(Request $request){

 if($request){
  $query=trim($request->get('searchText'));
  $cidade=DB::table('cidade as c')
  ->join('estado as e', 'e.idestado', '=', 
   'c.idestado')
  ->join('pais as p', 'p.idpais', '=', 
   'e.idpais')
  ->select('c.idcidade', 'c.nomeCidade', 
   'e.nomeEstado','p.nomePais','c.status')
  ->where('c.nomeCidade', 'LIKE', '%'.$query.'%')
  ->where('c.status','=','Ativo')
  ->orwhere('e.nomeEstado', 'LIKE', '%'.$query.'%')
  ->orderBy('idcidade','desc')
  ->paginate(7);
  return view('regiao.cidade.index', [
   "cidade"=>$cidade, "searchText"=>$query
 ]);
}
}

public function create(){

 $estado=DB::table('estado')
 ->where( 'status','=','Ativo')
 ->get();
 return view("regiao.cidade.create", ["estado"=>
  $estado]);


}


public function store(CidadeFormRequest $request){

  try{

   $cidade = new Cidade;
   $cidade->idestado=$request->get('idestado');
   $cidade->nomeCidade=$request->get('nomeCidade');
   $cidade->status='Ativo';
   
   $cidade->save();

   



   return Redirect::to('regiao/cidade');



   DB::commit();
 }

 catch(\Exception $Exception){
  DB::rollback();
  echo "<script>alert('Já existe um cadastro para esta  Cidade!');</script>"; 

  

  echo "<script>window.location = '/regiao/cidade';</script>";
}


}



public function show($id){
 return view("regiao.cidade.show", 
  ["cidade"=>Cidade::findOrFail($id)]);
}

public function edit($id){

 $cidade = Cidade::findOrFail($id);
 $estado = DB::table('estado')
 ->get();


 return view("regiao.cidade.edit", 
  ["cidade"=>$cidade, "estado"=>$estado]);
}

public function update(CidadeFormRequest $request, $id){
  try{
   $cidade=Cidade::findOrFail($id);
   $cidade->idestado=$request->get('idestado');
   $cidade->nomeCidade=$request->get('nomeCidade');
   $cidade->status=$request->get('status');
   $cidade->update();
   return Redirect::to('regiao/cidade');
   BD::commit();
 }
 catch(\Exception $Exception){
  DB::rollback();
  echo "<script>alert('Já existe um cadastro para esta Cidade!');</script>"; 



  echo "<script>window.location = '/regiao/cidade';</script>";
}


}
public function destroy($id){
 try{
   $cidade=Cidade::findOrFail($id);
   $cidade->delete();
   $cidade->update();
   return Redirect::to('regiao/cidade');
 }

 catch (\Exception $Exception ){
  DB::rollback();
  echo "<script>alert('Não é possivel Excluir um Cadastro em uso!');</script>";
  echo "<script>window.location = '/regiao/cidade';</script>";

}
}



}
