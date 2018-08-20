<?php $__env->startSection('conteudo'); ?>

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fornecedor <a href="fornecedor/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('pessoa.fornecedor.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Razão Social</th>
					<th>Nome Fantasia</th>
					<th>CNPJ</th>
					<th>Telefone</th>
					<th>E-mail</th>
					<th>Logradouro</th>
					<th>Cidade</th>
					<th>status</th>														
				</thead>
				<?php $__currentLoopData = $fornecedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $for): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($for->idfornecedor); ?></td>
					<td><?php echo e($for->razaoSocial); ?></td>
					<td><?php echo e($for->nomeFantasia); ?></td>
					<td><?php echo e($for->cnpj); ?></td>
					<td><?php echo e($for->telefone); ?></td>
					<td><?php echo e($for->email); ?></td>					
					<td><?php echo e($for->logradouro); ?></td>					
					<td><?php echo e($for->cidade); ?></td>														
					<td><?php echo e($for->status); ?></td>														
					
					<td>
						
						<a href="<?php echo e(URL::action('fornecedorController@edit',$for->idfornecedor)); ?>"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($for->idfornecedor); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('pessoa.fornecedor.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($fornecedor->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>