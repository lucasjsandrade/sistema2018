<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Categoria;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CategoriaFormRequest;
use Illuminate\Database\Eloquent\BaseModel;
use DB;

class CategoriaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){

   if($request){
    $query=trim($request->get('searchText'));
    $categoria=DB::table('categoria')
    ->where('nome', 'LIKE', '%'.$query.'%')
    ->orderBy('idcategoria','desc')
    ->paginate(7);
    return view('estoque.categoria.index', [
     "categoria"=>$categoria, "searchText"=>$query
   ]);
  }
}

public function create(){
 return view("estoque.categoria.create");
}


public function store(CategoriaFormRequest $request){
  try {
    $categoria = new Categoria;
    $categoria->nome=$request->get('nome');
    $categoria->descricao=$request->get('descricao');
    $categoria->status='Ativo';
    $categoria->save();
    return Redirect::to('estoque/categoria');
    DB::commit();
  }

  catch(\Exception $Exception){
    DB::rollback();
    echo "<script>alert('Ja existe um cadastro para esta categoria!');</script>"; 



    echo "<script>window.location = '/estoque/categoria';</script>";
  }


}




public function show($id){
 return view("estoque.categoria.show", 
  ["categoria"=>Categoria::findOrFail($id)]);
}

public function edit($id){
 return view("estoque.categoria.edit", 
  ["categoria"=>Categoria::findOrFail($id)]);
}

public function update(CategoriaFormRequest $request, $id){

  try{
    $categoria=Categoria::findOrFail($id);
    $categoria->nome=$request->get('nome');
    $categoria->descricao=$request->get('descricao');
    $categoria->status=$request->get('status');
    $categoria->update();
    return Redirect::to('estoque/categoria');
    DB::commit();
  }

  catch(\Exception $Exception){
    DB::rollback();
    echo "<script>alert('Ja existe um cadastro para esta categoria!');</script>"; 



    echo "<script>window.location = '/estoque/categoria';</script>";
  }


}

public function destroy($id){

  try{
    $categoria=Categoria::findOrFail($id);    
    $categoria->delete();
    $categoria->update();
    return Redirect::to('regiao/pais');
  }

  catch (\Exception $Exception ){
    DB::rollback();
    echo "<script>alert('Não é possivel Excluir um Cadastro em uso!');</script>";
    echo "<script>window.location = '/estoque/categoria';</script>";

  }
}
}
