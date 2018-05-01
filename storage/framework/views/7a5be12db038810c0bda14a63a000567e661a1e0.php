<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Pais <a href="pais/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('regiao.pais.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Pais</th>
					<th>Nome</th>
					<th>Sigla</th>
					
				</thead>
               <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($pai->idpais); ?></td>
					<td><?php echo e($pai->nomePais); ?></td>
					<td><?php echo e($pai->sigla); ?></td>
					<td><?php echo e($pai->status); ?></td>
					
					<td>
						<a href="<?php echo e(URL::action('PaisController@edit',$pai->idpais)); ?>"><button class="btn btn-info">Alterar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($pai->idpais); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>


                
					</td>
				</tr>
				<?php echo $__env->make('regiao.pais.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($pais->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>