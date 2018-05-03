<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Marcas   <a href="marca/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('estoque.marca.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nome</th>
					<th>Status</th>
					
				</thead>
				<?php $__currentLoopData = $marca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mar): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($mar->codigo); ?></td>
					<td><?php echo e($mar->nome); ?></td>
					<td><?php echo e($mar->status); ?></td>
					
					<td>
						<a href="<?php echo e(URL::action('MarcaController@edit',$mar->codigo)); ?>"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($mar->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>


						
					</td>
				</tr>
				<?php echo $__env->make('estoque.marca.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($marca->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>