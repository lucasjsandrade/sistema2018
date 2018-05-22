@extends('layouts.admin')
@section('conteudo')

<h1>Detalhes Da Venda </h1><br>

<?php
function converteData($data)
{
  return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>
<div class="row">
  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Nº da Venda</label>
      <p>{{($venda->idvenda)}}</p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p>{{$venda->nomeFuncionario}}</p>
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
      <label for="dataPedido">Data</label>
      <p>{{converteData($venda->dataVenda)}}</p>
      
    </div>
  </div> 








  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
     <label for="condicaoPagamento">Condicao Pagamento</label>
     <p>{{$venda->condicaoPagamento}}</p>
   </div>

 </div>



</div>
<br>
<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="formaPagamento">Forma Pagamento</label>
    <p>{{$venda->formaPagamento}}</p>
  </div>

</div>

<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="status">Status</label>
    <p>{{$venda->status}}</p>
  </div>

</div>

<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="numeroDeParcelas">Numero de Parcelas</label>
    <p>{{$venda->numeroDeParcelas}}</p>
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
             <td>{{$det->valorTotal}}</td>
             <?php 
             $final +=  $det->valorTotal; 
             ?>  

           </tr>
           @endforeach

           <th>TOTAL</th>
           <th></th>
           <th></th> 
           
           <td><input type="text" name="valorFinal" value="<?php echo $final; ?>" readonly id="total" class="form-control" style="width: 100px;"><td>



           </tbody>

         </table>
       </div>

     </div>
   </div>




 </div>      

 @stop