<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Cidade <a href="cidade/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('regiao.cidade.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Cidade</th>
					<th>Nome Cidade</th>
					<th>Nome Estado</th>
					<th>Nome Pais</th>
					<th>Status</th>

					<th>Pais</th>
				</thead>
               <?php $__currentLoopData = $cidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cid): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($cid->idcidade); ?></td>
					<td><?php echo e($cid->nomeCidade); ?></td>
					<td><?php echo e($cid->nomeEstado); ?></td>
					<td><?php echo e($cid->nomePais); ?></td>
					<td><?php echo e($cid->status); ?></td>
				
					<td>
						<a href="<?php echo e(URL::action('CidadeController@edit',$cid->idcidade)); ?>"><button class="btn btn-info">Alterar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($cid->idcidade); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('regiao.cidade.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($cidade->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>