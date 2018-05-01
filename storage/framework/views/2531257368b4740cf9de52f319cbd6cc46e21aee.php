<?php $__env->startSection('conteudo'); ?>
<div class="row"
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Lista de Agendamento <a href="agendamento/create"><button class="btn btn-success">Incluir</button></a></h3>
	<?php echo $__env->make('venda.agendamento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive form-group">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>				
					
					<th>Funcionario</th>
					<th>Cliente</th>					
					<th>Telefone</th>
					<th>Data de Lançamento</th>
					<th>Data de Orçamento</th>					
					<th>Data de Instalação</th>
					<th>Status</th>
					<th>Hora marcada</th>
					
				</thead>

				<?php
				function converteData($data){
					return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
				}
				?>


				<?php $__currentLoopData = $agendamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agen): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>    

				<tr>
					
					<td><?php echo e($agen->funcionario); ?></td>
					<td><?php echo e($agen->cliente); ?></td>					
					<td><?php echo e($agen->telefone); ?></td>
					<td><?php echo e(converteData($agen->dataLancamento)); ?></td>
					<td><?php echo e(converteData($agen->dataOrcamento)); ?></td>					
					<td><?php echo e(converteData($agen->dataInstalacao)); ?></td>
					<td><?php echo e($agen->status); ?></td>
					<td><?php echo e($agen->horaMarcada); ?></td>
					
					<td>
						<a href="<?php echo e(URL::action('agendamentoController@edit',$agen->idagendamento)); ?>"><button class="btn btn-info">alterar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($agen->idagendamento); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('venda.agendamento.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($agendamento->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>