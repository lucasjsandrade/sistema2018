<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Produto;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\ProdutoFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class ProdutoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $produto=DB::table('produto as p')
            ->join('categoria as c', 'c.idcategoria', '=', 
                'p.idcategoria')
            ->join('marca as m', 'm.codigo', '=', 
                'p.codigo')
            ->select('p.idproduto', 'p.modelo', 
             'p.cor','p.material','p.unidadeMedida','p.quantidade','p.preco','p.custo','p.status','p.dataCadastro','c.nome as categoria','m.nome as marca')
            ->where('p.modelo', 'LIKE', '%'.$query.'%') 
            ->orwhere('C.nome', 'LIKE', '%'.$query.'%') 
            
            ->orderBy('idproduto','desc')
            ->paginate(10);
            return view('estoque.produto.index', [
                "produtos"=>$produto, "searchText"=>$query
            ]);
        }
    }

    public function create(){

        $categorias=DB::table('categoria')
        ->where('status', '=', 'ativo')
        ->get();
        $marca=DB::table('marca')
        ->where('status', '=', 'ativo')
        ->get();
        return view("estoque.produto.create", ["categorias"=>
            $categorias],["marca"=>
            $marca]);
        
        
    }
    
    public function store(ProdutoFormRequest $request){

        try{
            $produto = new Produto;
            $produto->idcategoria=$request->get('idcategoria');
            $produto->codigo=$request->get('codigo');
            $produto->modelo=$request->get('modelo');
            $produto->cor=$request->get('cor');
            $produto->material=$request->get('material');
            $produto->unidadeMedida=$request->get('unidadeMedida');
            $produto->quantidade=0;
            $produto->preco=0;
            $produto->custo=0;
            $produto->status='Ativo';
            $mytime = Carbon::now('America/Sao_Paulo'); 
            $produto->dataCadastro=$mytime->toDateTimeString();



            $produto->save();
            return Redirect::to('estoque/produto');
        }
        
        catch(\Exception $Exception){
          DB::rollback();
          echo "<script>alert('Ja existe um cadastro para esta categoria!');</script>"; 



          echo "<script>window.location = '/estoque/categoria';</script>";
      }


  }



  public function show($id){
    return view("estoque.produto.show", 
        ["produto"=>Produto::findOrFail($id)]);
}

public function edit($id){

    $produto = Produto::findOrFail($id);
    $categorias = DB::table('categoria')
    ->where('status', '=','ativo')->get();
    $marca = DB::table('marca')
    ->where('status', '=','Ativo')->get();

    return view("estoque.produto.edit", 
        ["produto"=>$produto, "categorias"=>$categorias,"marca"=>$marca]);
}

public function update(ProdutoFormRequest $request, $id){
    $produto=Produto::findOrFail($id);
    $produto->idcategoria=$request->get('idcategoria');
    $produto->codigo=$request->get('codigo');
    $produto->cor=$request->get('cor');
    $produto->material=$request->get('material');
    $produto->unidadeMedida=$request->get('unidadeMedida');
    $produto->status=$request->get('status');
    $produto->preco=$request->get('preco');
    $produto->modelo=$request->get('modelo');
    


    $produto->update();


    return Redirect::to('estoque/produto');
}

public function destroy($id){
    try{
        $produto=Produto::findOrFail($id);
        $produto->delete();
        $produto->update();
        return Redirect::to('estoque/produto');
    }
    catch(\Exception $Exception){
      DB::rollback();
      $produto=DB::table('produto')
      ->where('status', '=', 'ativo')
      ->get();
      if ($produto->quantidade == 0) {
        dd($produto->quantidade);
        echo "Aqui";
        die();
        echo "<script>alert('Produto tem uma movimentacao nao pode ser excluido! Status alterado para Inativo');</script>"; 
        $produto->status='Inativo';
        $produto->update();

        echo "<script>window.location = '/estoque/produto';</script>";


    }else{
        echo "<script>alert('Não é possivel excluir um produto que possua estoque');</script>";
    }

    echo "<script>window.location = '/estoque/produto';</script>";
}

}
}
