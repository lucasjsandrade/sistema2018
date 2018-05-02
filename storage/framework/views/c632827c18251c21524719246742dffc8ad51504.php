<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Categoria   <a href="categoria/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('estoque.categoria.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Status</th>
					<th>Opções</th>
				</thead>
				<?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($cat->idcategoria); ?></td>
					<td><?php echo e($cat->nome); ?></td>
					<td><?php echo e($cat->descricao); ?></td>
					<td><?php echo e($cat->status); ?></td>

					<td>
						<a href="<?php echo e(URL::action('CategoriaController@edit',$cat->idcategoria)); ?>"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($cat->idcategoria); ?>" data-toggle="modal"><button class="btn btn-danger">Inativar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('estoque.categoria.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($categoria->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>