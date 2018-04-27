<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Produtos <a href="produto/create"><button class="btn btn-success">Novo</button></a></h3>
		<?php echo $__env->make('estoque.produto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Código</th>
					<th>Categoria</th>
					<th>Estoque</th>
					<th>Estado</th>
					<th>Imagem</th>					
					<th>Opções</th>
				</thead>
               <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($prod->idproduto); ?></td>
					<td><?php echo e($prod->nome); ?></td>
					<td><?php echo e($prod->codigo); ?></td>
					<td><?php echo e($prod->categoria); ?></td>
					<td><?php echo e($prod->estoque); ?></td>
					<td><?php echo e($prod->estado); ?></td>
					<td> 
						<img src="<?php echo e(asset('imagens/produtos/'.$prod->imagem)); ?>" alt="<?php echo e($prod->nome); ?>" 
						width="100px" height="100px"
						class="img-thumbnail">
					</td>

					
					<td>
						<a href="<?php echo e(URL::action('ProdutoController@edit',$prod->idproduto)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($prod->idproduto); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				<?php echo $__env->make('estoque.produto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
		<?php echo e($produtos->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>