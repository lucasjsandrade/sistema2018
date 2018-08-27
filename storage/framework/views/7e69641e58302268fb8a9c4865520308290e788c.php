<?php $__env->startSection('conteudo'); ?>

<?php
function converteData($data){
  return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>


<div class="row">

<h1>Detalhes Contas a Receber </h1><br>
<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <p><?php echo e($contasreceber->descricao); ?></p>
  </div>
</div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idvenda">N° da Venda</label>
      <p><?php echo e($contasreceber->idvenda); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idcontasr">N° da conta</label>
      <p><?php echo e($contasreceber->idcontasr); ?></p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Data Lancamento</label>
      <p><?php echo e(converteData($contasreceber->data)); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="parcela">N° de Parcelas</label>
      <p><?php echo e($contasreceber->parcela); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="valor">Valor</label>
      <p><?php echo e($contasreceber->valor); ?></p>
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
          </thead>
          <tfoot>


          </tfoot>

          <tbody>
            <?php $__currentLoopData = $parcelareceber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
             <td><?php echo e($pa->idparcela); ?></td>
             <td><?php echo e($pa->valorParcela); ?></td>
             <td><?php echo e(converteData($pa->dataVencimento)); ?></td>



           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

           
           <th></th>
           <th></th> 
           <th></th>




         </tbody>

       </table>
     </div>

   </div>
 </div>




</div>      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>