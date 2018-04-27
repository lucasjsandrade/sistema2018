<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Clientes <a href="cliente/create"><button class="btn btn-success">Novo</button></a></h3>
		<?php echo $__env->make('venda.cliente.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Tipo Documento</th>
					<th>Número Documento</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th>Email</th>
				</thead>
               <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pes): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($pes->idpessoas); ?></td>
					<td><?php echo e($pes->nome); ?></td>
					<td><?php echo e($pes->tipo_documento); ?></td>
					<td><?php echo e($pes->num_doc); ?></td>
					<td><?php echo e($pes->endereco); ?></td>
					<td><?php echo e($pes->telefone); ?></td>
					<td><?php echo e($pes->email); ?></td>
					<td>
						<a href="<?php echo e(URL::action('ClienteController@edit',$pes->idpessoas)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($pes->idpessoas); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('venda.cliente.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($pessoas->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>