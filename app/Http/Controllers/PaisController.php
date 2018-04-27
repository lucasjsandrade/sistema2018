<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Pais;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\PaisFormRequest;

use DB;


class PaisController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $pais=DB::table('pais')
            ->where('nomePais', 'LIKE', '%'.$query.'%')
            
            ->orderBy('idpais','desc')
            ->paginate(7);
            return view('regiao.pais.index', [
                "pais"=>$pais, "searchText"=>$query
            ]);
        }
    }

    public function create(){
        return view("regiao.pais.create");
    }
    
    public function store(PaisFormRequest $request){

        try{
            $pais= new Pais;
            $pais->nomePais=$request->get('nomePais');
            $pais->sigla=$request->get('sigla');
            $pais->status='Ativo';
            $pais->save();


            return Redirect::to('regiao/pais');
            DB::commit();

        }

        catch(\Exception $Exception){
          DB::rollback();
          echo "<script>alert('Já existe um cadastro para este Pais!');</script>"; 



          echo "<script>window.location = '/regiao/pais';</script>";
      }


  }

  public function show($id){
    return view("regiao.pais.show", 
        ["pais"=>Regiao::findOrFail($id)]);
}

public function edit($id){
    return view("regiao.pais.edit", [
        "pais"=>Pais::findOrFail($id)]);
}

public function update(PaisFormRequest $request, $id){
    try{
        $pais=Pais::findOrFail($id);
        $pais->nomePais=$request->get('nomePais');
        $pais->sigla=$request->get('sigla');
        $pais->status=$request->get('status');
        $pais->update();
        return Redirect::to('regiao/pais'); 
        DB::commit();

    }

    catch(\Exception $Exception){
      DB::rollback();
      echo "<script>alert('Já existe um cadastro para este Pais!');</script>"; 



      echo "<script>window.location = '/regiao/pais';</script>";
  }


}
public function destroy($id){
    $pais=Pais::findOrFail($id);
    $pais->status='Inativo';

    $pais->update();
    return Redirect::to('regiao/pais');
}
}