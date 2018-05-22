@extends('layouts.admin')
@section('conteudo')

<h1>Detalhes Do Pedido</h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p>{{$compra->nomeFuncionario}}</p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero Pedido</label>
      <p>{{$compra->idcompra}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p>{{$compra->dataCompra}}</p>
    </div>
  </div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="fornecedor">Fornecedor</label>
      <p>{{$compra->razaoSocial}}</p>
    </div>

  </div>



  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="formaPagamento">Forma Pagamento</label>
      <p>{{$compra->formaPagamento}}</p>
    </div>

  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
     <label for="condicaoPagamento">Condicao Pagamento</label>
     <p>{{$compra->condicaoPagamento}}</p>
   </div>
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
            <th>Total</th>
          </thead>
          <tfoot>

            <th></th>
            <th></th>
            <th></th> 
            <th></th>
            <th id="total">{{$compra->total}}</th>     
          </tfoot>

          <tbody>
            @foreach($itensc as $det)
            <tr>
             <td>{{$det->modelo}}</td>

             <td>{{$det->quantidade}}</td>

             <td>{{$det->valorUnitario}}</td>
             <td>{{$det->valorTotal}}</td>                                           
           </tr>
           @endforeach



         </tbody>

       </table>
     </div>

   </div>
 </div>
</div>      

@stop