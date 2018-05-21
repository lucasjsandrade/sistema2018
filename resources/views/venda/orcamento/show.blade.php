@extends('layouts.admin')
@section('conteudo')

<h1>Detalhes Do Orçamento </h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p>{{$venda->nomeFuncionario}}</p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero da Venda</label>
      <p>{{$venda->idvenda}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p>{{$venda->dataVenda}}</p>
    </div>
  </div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="cliente">Cliente</label>
      <p>{{$venda->nomeCliente}}</p>
    </div>

  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="status">Status</label>
      <p>{{$venda->status}}</p>
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
              <th>Mão de Obra</th>
              <th>Desconto</th>
              <th>Valor Total do Ítem</th>
            </thead>
            <tfoot>


            </tfoot>

            <tbody>

              <?php $final= 0; ?>

              @foreach($itens as $det)
              <tr>
               <td>{{$det->modelo}}</td>

               <td>{{$det->quantidade}}</td>
               <td>{{$det->valorUnitario}}</td>
               <td>{{$det->maodeobra}}</td>
               <td>{{$det->desconto}}</td>
               <td>{{$det->valorTotal}}</td>

               <?php 
               $final +=  $det->valorTotal; 
               ?>




             </tr>
             @endforeach

             <th>Total</th>
             <th></th>
             <th></th> 
             <th></th>
             <th></th>
             
             <td>
              <input type="text" name="valorFinal" value="<?php echo $final; ?>" readonly id="total" class="form-control" style="width: 100px;">
            </td>  



          </tbody>

        </table>
      </div>

    </div>
  </div>




</div>      

@stop