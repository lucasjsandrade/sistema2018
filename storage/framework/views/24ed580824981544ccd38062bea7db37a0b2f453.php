<?php $__env->startSection('conteudo'); ?>

<h1>Detalhes Do Pedido</h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p><?php echo e($compra->nomeFuncionario); ?></p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero Pedido</label>
      <p><?php echo e($compra->idcompra); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p><?php echo e($compra->dataCompra); ?></p>
    </div>
  </div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="fornecedor">Fornecedor</label>
      <p><?php echo e($compra->razaoSocial); ?></p>
    </div>

  </div>



  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="formaPagamento">Forma Pagamento</label>
      <p><?php echo e($compra->formaPagamento); ?></p>
    </div>

  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
     <label for="condicaoPagamento">Condicao Pagamento</label>
     <p><?php echo e($compra->condicaoPagamento); ?></p>
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
            <th id="total"><?php echo e($compra->total); ?></th>     
          </tfoot>

          <tbody>
            <?php $__currentLoopData = $itensc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
             <td><?php echo e($det->modelo); ?></td>

             <td><?php echo e($det->quantidade); ?></td>

             <td><?php echo e($det->valorUnitario); ?></td>
             <td><?php echo e($det->valorTotal); ?></td>                                           
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



         </tbody>

       </table>
     </div>

   </div>
 </div>
</div>      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>