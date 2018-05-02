<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Estado <a href="estado/create"><button class="btn btn-success">Incluir</button></a></h3>
    <?php echo $__env->make('regiao.estado.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Id Estado</th>
          <th>Estado</th>
          <th>Sigla</th>
          <th>Pais</th>
          <th>Status</th>

        </thead>
        <?php $__currentLoopData = $estado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
          <td><?php echo e($est->idestado); ?></td>
          <td><?php echo e($est->nomeEstado); ?></td>
          <td><?php echo e($est->sigla); ?></td>
          <td><?php echo e($est->pais); ?></td>
          <td><?php echo e($est->status); ?></td>
          

          <td>
           <a href="<?php echo e(URL::action('EstadoController@edit',$est->idestado)); ?>"><button class="btn btn-info">Alterar</button></a>
           <a href="" data-target="#modal-delete-<?php echo e($est->idestado); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>

         </td>

       </tr>

       <?php echo $__env->make('regiao.estado.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
       
       
       
     </table>

   </div>
   
   <?php echo e($estado->render()); ?>

 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>