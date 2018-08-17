<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Produtos <a href="produto/create"><button class="btn btn-success">Incluir</button></a></h3>
		<?php echo $__env->make('estoque.produto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Categoria</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Cor</th>
					<th>Preco</th>
					<th>Materia</th>
					<th>Unidade Medida</th>
					<th>Quantidade</th>
					<th>Preço Venda</th>
					<th>Custo</th>
					<th>Status</th>	
					<th>Data Cadastro</th>
					<th>Opções</th>					
				</thead>

				 <?php
			        function converteData($data){
			          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
			        }
			      ?>

				<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($prod->idproduto); ?></td>
					<td><?php echo e($prod->categoria); ?></td>
					<td><?php echo e($prod->modelo); ?></td>
					<td><?php echo e($prod->marca); ?></td>
					<td><?php echo e($prod->cor); ?></td>
					<td><?php echo e($prod->preco); ?></td>
					<td><?php echo e($prod->material); ?></td>
					<td><?php echo e($prod->unidadeMedida); ?></td>
					<td><?php echo e($prod->quantidade); ?></td>
					<td><?php echo e($prod->preco); ?></td>
					<td><?php echo e($prod->custo); ?></td>
					<td><?php echo e($prod->status); ?></td>
					<td><?php echo e(converteData ($prod->dataCadastro)); ?></td>
					<td>
						<a href="<?php echo e(URL::action('ProdutoController@edit',$prod->idproduto)); ?>"><button class="btn btn-info">Alterar</button></a></td>
						<td> <a href="" data-target="#modal-delete-<?php echo e($prod->idproduto); ?>" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td> 
						
						
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