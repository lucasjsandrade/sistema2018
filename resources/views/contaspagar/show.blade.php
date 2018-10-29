@extends('layouts.admin')
@section('conteudo')

<?php
function converteData($data){
  return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>
<div class="row">

<h1>Detalhes Contas a Pagar </h1><br>
<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <p>{{$contaspagar->descricao}}</p>
  </div>
</div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idcompra">N° da Compra</label>
      <p>{{$contaspagar->idcompra}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idcontasp">N° da conta</label>
      <p>{{$contaspagar->idcontasp}}</p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Data Lancamento</label>
      <p>{{converteData($contaspagar->data)}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="parcela">N° de Parcelas</label>
      <p>{{$contaspagar->parcela}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="valor">Valor</label>
      <p>{{$contaspagar->valor}}</p>
    </div>
  </div> 




  
</div>



<div class="row">


  <div class="panel panel-primary">
    <div class="panel-body">


      <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
        <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
          <thead style="background-color:#A9D0F5">


            <th>Id</th>
            <th>Valor</th>
            <th>Data Vencimento</th>
            <th>Status</th>
          </thead>
          <tfoot>


          </tfoot>

          <tbody>
            @foreach($parcelapagar as $pa)
            <tr>
             <td>{{$pa->idparcela}}</td>
             <td>{{$pa->valorParcela}}</td>
             <td>{{($pa->status)}}</td>



           </tr>
           @endforeach

           
           <th></th>
           <th></th> 
           <th></th>




         </tbody>

       </table>
     </div>

   </div>
 </div>




</div>      

@stop