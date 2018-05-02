<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Compra <a href="compra/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('compra.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>					
					<th>Data</th>					
					<th>Numero da Compra</th>
					<th>ID:Fucionario</th>
					<th>ID:Fornecedor</th>                
					<th>status</th>				
					<th>Total</th>
					<th>Opções</th>						
				</thead>

				 <?php
			        function converteData($data)
			        {
			          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
			        }
			     ?>

				<?php $__currentLoopData = $compra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					
					<td><?php echo e(converteData($com->dataCompra)); ?></td>
					<td><?php echo e($com->idcompra); ?></td>
					<td><?php echo e($com->nomeFuncionario); ?></td>
					<td><?php echo e($com->nomeFantasia); ?></td>
					<td><?php echo e($com->status); ?></td>
					<td><?php echo e($com->totalCompra); ?></td>					
				
					<td>
						<a href="<?php echo e(URL::action('CompraController@show',$com->idcompra)); ?>"><button class="btn btn-info">Detalhe</button></a>
					</td>
				</tr>

				<?php echo $__env->make('compra.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>

		</div>
		<?php echo e($compra->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>