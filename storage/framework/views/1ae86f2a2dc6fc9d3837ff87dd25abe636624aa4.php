<?php $__env->startSection('conteudo'); ?>
<div class="row">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>

						<th>Data</th>

						<th>descricao</th>
						<th>Tpo Movimentacao</th>
						<th>Valor</th>

						<th>Total</th>

						<th>Opções</th>



					</thead>



					<?php $__currentLoopData = $caixa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<tr>
						<td><?php echo e($c->data); ?></td>					
						<td><?php echo e($c->tipoMovimentacao); ?></td>					
						<td><?php echo e($c->valor); ?></td>	

						<!---->








						<td>
							<a href="<?php echo e(URL::action('VendaController@show',$v->idvenda)); ?>"><button class="btn btn-info">Detalhe</button></a>
						</td>


					</tr>

					<?php echo $__env->make('caixa.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</table>

			</div>
			<?php echo e($caixa->render()); ?>

		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>