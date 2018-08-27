<?php $__env->startSection('conteudo'); ?>


<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Funcionário   <a href="funcionario/create"><button class="btn btn-success">Incluir</button></a></h3>
    <?php echo $__env->make('pessoa.funcionario.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>

<div class="row">
 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="table-responsive">

      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Código Funcionário</th>
          <th>Nome</th>
          <th>Logradouro</th>
          <th>numero</th>
          <th>data Nacimento</th>
          <th>status</th>
          <th>data Cadastro</th>
          <th>Cidade</th>
        </thead>

         <?php
          function converteData($data)
          {
          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
          }
        ?>

         <?php $__currentLoopData = $funcionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        <tr>
          <td><?php echo e($fun->idfuncionario); ?></td>
          <td><?php echo e($fun->nomeFuncionario); ?></td>
          <td><?php echo e($fun->logradouro); ?></td>
          <td><?php echo e($fun->numero); ?></td>
          <td><?php echo e(converteData ($fun->dataNascimento)); ?></td>
          <td><?php echo e($fun->status); ?></td>
          <td><?php echo e(converteData ($fun->dataCadastro)); ?></td>
          <td><?php echo e($fun->cidade); ?></td>

        <td>
          <a href="<?php echo e(URL::action('FuncionarioController@edit',$fun->idfuncionario)); ?>"><button class="btn btn-info">Alterar</button></a>
          <a href="" data-target="#modal-delete-<?php echo e($fun->idfuncionario); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td>
       </tr>
        <?php echo $__env->make('pessoa.funcionario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        
     </table>
    </div>
    <?php echo e($funcionario->render()); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>