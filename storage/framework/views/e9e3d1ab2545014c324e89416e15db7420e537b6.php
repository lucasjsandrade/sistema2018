<?php $__env->startSection('conteudo'); ?>

<h1>Detalhes Do Orçamento </h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p><?php echo e($venda->nomeFuncionario); ?></p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero da Venda</label>
      <p><?php echo e($venda->idvenda); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p><?php echo e($venda->dataVenda); ?></p>
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
      <label for="status">Status</label>
      <p><?php echo e($venda->status); ?></p>
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
              <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
               <td><?php echo e($det->modelo); ?></td>

               <td><?php echo e($det->quantidade); ?></td>
               <td><?php echo e($det->valorUnitario); ?></td>
               <td><?php echo e($det->maodeobra); ?></td>
               <td><?php echo e($det->desconto); ?></td>
               <td><?php echo e($det->valorTotal); ?></td>

             

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            <th>Total</th>
            <th></th>
            <th></th> 
            <th></th>
            <th></th>
            <td>
              <input type="text" name="valorTotal" value="<?php echo e($det->valorFinal); ?>" readonly id="total" class="form-control" style="width: 100px;">
            </td>  



          </tbody>

        </table>
      </div>

    </div>
  </div>




</div>      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>