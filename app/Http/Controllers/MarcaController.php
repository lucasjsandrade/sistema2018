<?php

namespace sistemaLaravel\Http\Controllers;
use Illuminate\Http\Request;
use sistemaLaravel\Marca;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\MarcaFormRequest;
use DB;


class MarcaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');	
  }

  public function index(Request $request){

   if($request){
    $query=trim($request->get('searchText'));
    $marca=DB::table('marca')
    ->where('nome', 'LIKE', '%'.$query.'%')

    ->orderBy('codigo','desc')
    ->paginate(7);
    return view('estoque.marca.index', [
     "marca"=>$marca, "searchText"=>$query
   ]);
  }
}

public function create(){
 return view("estoque.marca.create");
}

public function store(MarcaFormRequest $request){
  try{
   $marca= new Marca;
   $marca->nome=$request->get('nome');
   $marca->status='Ativo';
   $marca->save();
   return Redirect::to('estoque/marca');
   DB::commit();
 }

 catch(\Exception $Exception){
  DB::rollback();
  echo "<script>alert('Já existe uma marca com este cadastro!');</script>"; 



  echo "<script>window.location = '/estoque/marca/create';</script>";
}




}

public function show($id){
 return view("estoque.marca.show", 
  ["marca"=>Marca::findOrFail($id)]);
}

public function edit($id){
 return view("estoque.marca.edit", 
  ["marca"=>Marca::findOrFail($id)]);
}

public function update(MarcaFormRequest $request, $id){
  try{
   $marca=Marca::findOrFail($id);
   $marca->nome=$request->get('nome');
   $marca->status=$request->get('status');
   $marca->update();
   return Redirect::to('estoque/marca');
   DB::commit();
 }

 catch(\Exception $Exception){
  DB::rollback();
  echo "<script>alert('Já existe uma marca com este cadastro!');</script>"; 



  echo "<script>window.location = '/estoque/marca';</script>";
}




}

public function destroy($id){
  try{
   $marca=Marca::findOrFail($id);
   $marca->delete();
   $marca->update();
   return
   Redirect::to('estoque/marca');
 }
 catch (\Exception $Exception ){
  DB::rollback();
  echo "<script>alert('Não é possivel Excluir um Cadastro em uso!');</script>";
  echo "<script>window.location = '/estoque/marca';</script>";

}
}
}
