<?php $__env->startSection('conteudo'); ?>

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
      <p><?php echo e(($venda->idvenda)); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p><?php echo e($venda->nomeFuncionario); ?></p>
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="cliente">Cliente</label>
      <p><?php echo e($venda->nomeCliente); ?></p>
    </div>

  </div>


  

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p><?php echo e(converteData($venda->dataVenda)); ?></p>
      
    </div>
  </div> 








  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
     <label for="condicaoPagamento">Condicao Pagamento</label>
     <p><?php echo e($venda->condicaoPagamento); ?></p>
   </div>

 </div>



</div>
<br>
<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="formaPagamento">Forma Pagamento</label>
    <p><?php echo e($venda->formaPagamento); ?></p>
  </div>

</div>

<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="status">Status</label>
    <p><?php echo e($venda->status); ?></p>
  </div>

</div>

<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="numeroDeParcelas">Numero de Parcelas</label>
    <p><?php echo e($venda->numeroDeParcelas); ?></p>
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
           <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
           <tr>
             <td><?php echo e($det->modelo); ?></td>

             <td><?php echo e($det->quantidade); ?></td>

             <td><?php echo e($det->valorUnitario); ?></td>
             <td><?php echo e($det->valorTotal); ?></td>
             <?php 
             $final +=  $det->valorTotal; 
             ?>  

           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>