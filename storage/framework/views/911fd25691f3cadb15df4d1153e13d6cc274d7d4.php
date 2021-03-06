<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar Categoria: <?php echo e($categoria->nome); ?></h3>
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

<?php echo Form::model($categoria, ['method'=>'PUT', 'route'=>['categoria.update', $categoria->idcategoria]]); ?>

<?php echo e(Form::token()); ?>


<div class="form-group">
	<label for="nome">Nome</label>
	<span class="ob">*</span>
	<input type="text" name="nome" required class="form-control" 
	value="<?php echo e($categoria->nome); ?>"
	placeholder="Nome...">
</div>

<div class="form-group">
	<label for="descricao">Descrição</label>
	<span class="ob">*</span>
	<input type="text" name="descricao" required class="form-control"
	value="<?php echo e($categoria->descricao); ?>"
	placeholder="Descrição...">
</div>

<div class="col-lg-12 col-sm-12 col-xs-12"> 
	<div class="form-group"><br>
		<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
		<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button>  
		<label class="pull-right">Campo com '<span class="ob">*</span>' obrigatório</label>
	</div> 
</div>

<?php echo Form::close(); ?>		
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>