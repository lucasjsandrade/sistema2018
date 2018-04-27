<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Estado;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\EstadoFormRequest;
use DB;
class EstadoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $estado=DB::table('estado as e')
            ->join('pais as p','p.idpais','=','e.idpais')
            ->select('e.idestado','e.nomeEstado','e.sigla','e.status','p.idpais','p.nomePais as pais')
            ->where('e.nomeEstado', 'LIKE', '%'.$query.'%')
            
            ->orderBy('idestado','desc')
            ->paginate(7);
            return view('regiao.estado.index', [
                "estado"=>$estado, "searchText"=>$query
            ]);
        }
    }

    public function create(){

        $pais=DB::table('pais')
        ->get();
        return view("regiao.estado.create", 
            ["pais"=>$pais]);

    }
    
    public function store(EstadoFormRequest $request){
        try{    
            $estado = new Estado;
            $estado->idpais=$request->get('idpais');
            $estado->nomeEstado=$request->get('nomeEstado');
            $estado->sigla=$request->get('sigla');
            $estado->status='Ativo';
            $estado->save();
            return Redirect::to('regiao/estado');
            BD::commit();
        }

        catch(\Exception $Exception){
          DB::rollback();
          echo "<script>alert('Já existe um cadastro para este Estado!');</script>"; 



          echo "<script>window.location = '/regiao/estado';</script>";
      }


  }     

  public function show($id){
    return view("regiao.estado.show", 
        ["estado"=>Estado::findOrFail($id)]);
}

public function edit($id){
    $estado = Estado::findOrFail($id);
    $pais =DB::table('pais')
    ->get();
    return view("regiao.estado.edit", 
        ["estado"=>$estado,"pais"=>$pais]);

}

public function update(EstadoFormRequest $request, $id){
    try{
        $estado= Estado::findOrFail($id);
        $estado->idpais=$request->get('idpais');
        $estado->nomeEstado=$request->get('nomeEstado');
        $estado->sigla=$request->get('sigla');
        $estado->status=$request->get('status');
        $estado->update();
        return Redirect::to('regiao/estado');
        BD::commit();
    }
    catch(\Exception $Exception){
      DB::rollback();
      echo "<script>alert('Já existe um cadastro para este Estado!');</script>"; 



      echo "<script>window.location = '/regiao/estado';</script>";
  }


}

public function destroy($id){
    $estado = Estado::findOrFail($id);
    $estado->status='Inativo';
    $estado->update();
    return Redirect::to('regiao/estado');
}




}
