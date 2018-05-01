<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Pedidos <a href="pedido/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('pedido.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					<!--<th>ID:Fucionario</th>-->
					<th>Numero do Pedido</th>
					<th>ID:Fornecedor</th>
                    <!--<th>Produto</th>
                    <th>Medida</th>
					<th>Quantidade</th>
					<th>Valor Unitario</th> -->
					
					
					<th>status</th>
					<!--<th>Forma Pagamento</th>
					<th>Condicao Pagamento</th> -->

					<th>Opções</th>
					
					
					
				</thead>

				<?php
				function converteData($data){
					return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
				}
				?>
				<?php $__currentLoopData = $pedido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ped): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					
					<td><?php echo e(converteData ($ped->dataPedido)); ?></td>
					<td><?php echo e($ped->idpedido); ?></td>
					<td><?php echo e($ped->nomeFantasia); ?></td>
					
					

					
					<td><?php echo e($ped->status); ?></td>
					
					
					

					<td>
						<a href="<?php echo e(URL::action('PedidoController@show',$ped->idpedido)); ?>"><button class="btn btn-info">Detalhes</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($ped->idpedido); ?>" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>

					</td> 


				</tr>

				<?php echo $__env->make('pedido.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>

		</div>
		<?php echo e($pedido->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>