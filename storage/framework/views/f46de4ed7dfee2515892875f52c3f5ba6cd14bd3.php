<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Novo Orcamento <a href="/venda/orcamento/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('venda.orcamento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					
					<th>Numero do Orçamento</th>
					<th>Fucionario  : cod</th>
					<th>Cliente   : cod</th>
					
					<th>status</th>			

					<th>Opções</th>
					
					
					
				</thead>

				

				<?php $__currentLoopData = $orcamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($o->dataOrcamento); ?></td>
					<td><?php echo e($o->idorcamento); ?></td>					
					<td><?php echo e($o->nomeFuncionario." : ".$o->idfuncionario); ?></td>					
					<td><?php echo e($o->nomeCliente." :     ".$o->idcliente); ?></td>					
					<td><?php echo e($o->status); ?></td>
					



					<td>
						<a href="<?php echo e(URL::action('orcamentoController@show',$o->idorcamento)); ?>"><button class="btn btn-info">Detalhe</button></a>
						 
						<a href="<?php echo e(URL::action('orcamentoController@edit',$o->idorcamento)); ?>"><button type="submit" class="btn btn-info">Alterar</button></a>
						 
					</td>



				</tr>

				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>

		</div>
		<?php echo e($orcamento->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>