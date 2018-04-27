@extends('layouts.admin')
@section('conteudo')
{{Form::Open(array('action'=>array('orcamentoController@destroy',$orcamento->idorcamento),'method'=>'delete'))}}
{{Form::token()}} 




<h1>Detalhes Do Orcamento </h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p>{{$orcamento->nomeFuncionario}}</p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero do Orcamento</label>
      <p>{{$orcamento->idorcamento}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p>{{$orcamento->dataOrcamento}}</p>
    </div>
  </div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="cliente">Cliente</label>
      <p>{{$orcamento->nomeCliente}}</p>
    </div>

  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="status">Status</label>
      <p>{{$orcamento->status}}</p>
    </div>

  </div>
  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="status">Observação</label>
      <p>{{$orcamento->observacao}}</p>
    </div>

  </div>


  <div class="row">

    <div class="panel panel-primary">
      <div class="panel-body">


        <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
          <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color:#A9D0F5">


              <th>Produto</th>
              <th>Quantidade</th>
              <th>Valor unitario</th>
              <th>Valor Total</th>
              <th >Total</th>
            </thead>
            <tfoot >


            </tfoot>

            <tbody>


              @foreach($itens as $det)


              <tr>
               <td>{{$det->nome." ".$det->modelo." ".$det->unidadeMedida}}</td>

               <td>{{$det->quantidade}}</td>

               <td>{{$det->valorUnitario}}</td>
               <td >{{$det->valorTotal}}</td>

             </tr>
             @endforeach
             
             


             <th>Total </th>
             <th></th>
             <th></th> 
             <th></th>
             <th style="background-color:#A9D0F5">{{$det->valorTotal}}<th>  



             </tbody >

           </table>
         </div>

       </div>

     </div>


     

  </div>   
  <div>
     <tr>
         <td>

          <a><button type="submit" class="btn btn-danger">Excluir</button></a>
          <a ><button class="btn btn-primary">Finalizar orcamento</button></a>

          


        </td>  
      </tr>  
  </div> 
  {!!Form::close()!!} 
  @stop