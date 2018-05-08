<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Usuários <a href="usuario/create"><button class="btn btn-success">Novo</button></a></h3>
		<?php echo $__env->make('seguranca.usuario.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Opções</th>
				</thead>
               <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($user->id); ?></td>
					<td><?php echo e($user->name); ?></td>
					<td><?php echo e($user->email); ?></td>
					<td>
						<a href="<?php echo e(URL::action('usuarioController@edit',$user->id)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($user->id); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('seguranca.usuario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($usuarios->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>