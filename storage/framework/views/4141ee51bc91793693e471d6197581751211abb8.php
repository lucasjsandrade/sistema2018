<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Cliente <a href="cliente/create"><button class="btn btn-success">Incluir</button></a></h3>
    <?php echo $__env->make('pessoa.cliente.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Id Cliente</th>
          <th>Nome</th>
          <th>Logradouro</th>
          <th>numero</th>
          <th>data Nacimento</th>
          <th>status</th>
          <th>data Cadastro</th>
          <th>Cidade</th>
        </thead>
        <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
          <td><?php echo e($cli->idcliente); ?></td>
          <td><?php echo e($cli->nomeCliente); ?></td>
          <td><?php echo e($cli->logradouro); ?></td>
          <td><?php echo e($cli->numero); ?></td>
          <td><?php echo e($cli->dataNascimento); ?></td>
          <td><?php echo e($cli->status); ?></td>
          <td><?php echo e($cli->dataCadastro); ?></td>
          <td><?php echo e($cli->cidade); ?></td>

          <td>
            <a href="<?php echo e(URL::action('ClienteController@edit',$cli->idcliente)); ?>"><button class="btn btn-info">Alterar</button></a>
            <a href="" data-target="#modal-delete-<?php echo e($cli->idcliente); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td>
          </tr>
          <?php echo $__env->make('pessoa.cliente.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>
      </div>
      <?php echo e($cliente->render()); ?>

    </div>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>