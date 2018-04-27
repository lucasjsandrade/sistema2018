<?php $__env->startSection('conteudo'); ?>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Produto: <?php echo e($produto->nome); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
</div>

			<?php echo Form::model($produto, ['method'=>'PATCH', 'route'=>['produto.update', $produto->idproduto], 'files'=>'true']); ?>

			<?php echo e(Form::token()); ?>


           <div class="row">
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
	            	<div class="form-group">
	            	<label for="nome">Nome</label>
	            	<input type="text" name="nome" required value="<?php echo e($produto->nome); ?>" class="form-control" placeholder="Nome...">
	            	</div>
            	</div>

            	

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            		<label>Categoria</label>
            		<select name="idcategoria" class="form-control">
	            		<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	            			<?php if($cat->idcategoria==$produto->idcategoria): ?>
	            			<option value="<?php echo e($cat->idcategoria); ?>" selected>
	            			<?php echo e($cat->nome); ?>

	            			</option>
	            			<?php else: ?>
	            			<option value="<?php echo e($cat->idcategoria); ?>">
	            			<?php echo e($cat->nome); ?>

	            			</option>
	            			<?php endif; ?>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            		</select>
            		</div>
            		
            	</div>

            		
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="codigo">Código</label>
	            	<input type="text" name="codigo" required value="<?php echo e($produto->codigo); ?>" class="form-control" placeholder="Código do Produto...">
	            	</div>
            		
            	</div>
            		
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="estoque">Estoque</label>
	            	<input type="text" name="estoque" required value="<?php echo e($produto->estoque); ?>" class="form-control" placeholder="Estoque...">
	            	</div>	
            		
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" value="<?php echo e($produto->descricao); ?>" name="descricao" class="form-control" placeholder="Descrição...">
            		</div>
            		
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
            	<label for="imagem">Imagem</label>
            	<input type="file" name="imagem" 
            	class="form-control">
	            	<?php if(($produto->imagem)!=""): ?>
	            		<img src="<?php echo e(asset('imagens/produtos/'.$produto->imagem)); ?>" width="200px">
	            	<?php endif; ?>
            		</div>
            		
            	</div>

            </div>

            
           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>		
            
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>