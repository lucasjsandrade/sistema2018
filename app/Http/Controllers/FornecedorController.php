<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\fornecedor;
use Illuminate\support\Facades\Redirect;
use sistemaLaravel\Http\requests\fornecedorFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class fornecedorController extends Controller
{
 public function __construct(){
  $this->middleware('auth');
}

public function index(Request $request){

 if($request){
  $query=trim($request->get('searchText'));
  $fornecedor=DB::table('fornecedor as for')
  ->join('cidade as cid', 'cid.idcidade', '=', 'for.idcidade')        
  ->select('for.idfornecedor','for.razaoSocial', 'for.nomeFantasia', 'for.cnpj', 'for.telefone', 'for.email', 'for.logradouro', 'cid.nomeCidade as cidade','for.status')
   			->where('for.nomeFantasia','LIKE', '%'.$query.'%')//Com a porcentagem a direita e a esquerda busca consegue buscar o que tiver a direita e a esquerda 

        ->orderBy('idfornecedor')
        ->paginate(10);
        return view('pessoa.fornecedor.index', [
          "fornecedor"=>$fornecedor, "searchText"=>$query
        ]);
      }
    }

    

    public function create(){

    	$cidade=DB::table('cidade')
    	->get();

      return view("pessoa.fornecedor.create",
        ["cidade"=>$cidade]);
    }

    
    
    public function store(fornecedorFormRequest $request){
      try{
        $fornecedor = new fornecedor;
        $fornecedor->idcidade=$request->get('idcidade');
        $fornecedor->razaoSocial=$request->get('razaoSocial');
        $fornecedor->nomeFantasia=$request->get('nomeFantasia');
        $fornecedor->nomeContato=$request->get('nomeContato');
        $fornecedor->cnpj=$request->get('cnpj');
        $fornecedor->inscricaoEstadual=$request->get('inscricaoEstadual');
        $fornecedor->telefone=$request->get('telefone');
        $fornecedor->fax=$request->get('fax');
        $fornecedor->whatsapp=$request->get('whatsapp');
        $fornecedor->email=$request->get('email');
        $fornecedor->logradouro=$request->get('logradouro');
        $fornecedor->numero=$request->get('numero');
        $fornecedor->bairro=$request->get('bairro');
        $fornecedor->cep=$request->get('cep');
        $fornecedor->status='Ativo';   
        $mytime = Carbon::now('America/Sao_Paulo'); 
        $fornecedor->dataCadastro=$mytime->toDateTimeString();
        $fornecedor->save();
        return Redirect::to('pessoa/fornecedor');
      }

      catch(\Exception $Exception){
        DB::rollback();
        echo "<script>alert('Ja existe um Cadastro para este Fornecedor!');</script>"; 



        echo "<script>window.location = '/pessoa/fornecedor';</script>";
      }


    }

    public function show($id){
     return view("pessoa.fornecedor.show",
			["fornecedor"=>fornecedor::findOrFail($id)]);//findOrFail mostra a categoria baseada no ID | quando pedir para exibir ele vai abrir a categoria baseada no ID. Os colchetes são uma matriz que vai puxar as informações do metodo STORE.
     
   }

   public function edit($id){

    $fornecedor = fornecedor::findOrFail($id);
    $cidade = DB::table('cidade')
    ->get();
    
    return view("pessoa.fornecedor.edit",
     ["fornecedor"=>$fornecedor, "cidade"=>$cidade]);

}

public function update(fornecedorFormRequest $request, $id){
  $fornecedor = fornecedor::findOrFail($id);
  $fornecedor->idcidade=$request->get('idcidade');
  $fornecedor->razaoSocial=$request->get('razaoSocial');
  $fornecedor->nomeFantasia=$request->get('nomeFantasia');
  $fornecedor->nomeContato=$request->get('nomeContato');
  $fornecedor->cnpj=$request->get('cnpj');
  $fornecedor->inscricaoEstadual=$request->get('inscricaoEstadual');
  $fornecedor->telefone=$request->get('telefone');
  $fornecedor->fax=$request->get('fax');
  $fornecedor->whatsapp=$request->get('whatsapp');
  $fornecedor->email=$request->get('email');
  $fornecedor->logradouro=$request->get('logradouro');
  $fornecedor->numero=$request->get('numero');
  $fornecedor->bairro=$request->get('bairro');
  $fornecedor->cep=$request->get('cep');          
  $fornecedor->status=$request->get('status');          

  $fornecedor->update();
  return Redirect::to('pessoa/fornecedor');
}

public function destroy($id){
  try{
    $fornecedor=fornecedor::findOrFail($id);
    $fornecedor->delete();
    $fornecedor->update();
    return Redirect::to('pessoa/fornecedor');   
  }

  catch(\Exception $Exception){
    DB::rollback();
    echo "<script>alert('Não é possivel Excluir um Cadastro em uso!');</script>"; 



    echo "<script>window.location = '/pessoa/fornecedor';</script>";
  }
}
}