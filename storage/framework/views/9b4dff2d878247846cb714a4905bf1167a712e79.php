<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar Marca: <?php echo e($marca->nome); ?></h3>
		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php echo Form::model($marca, ['method'=>'PATCH', 'route'=>['marca.update', $marca->codigo]]); ?>

		<?php echo e(Form::token()); ?>


		<div class="form-group">
			<label for="nome">Nome</label>
			<span class="ob">*</span>
			<input type="text" name="nome" required class="form-control" 
			value="<?php echo e($marca->nome); ?>"
			placeholder="Nome...">
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<span class="ob">*</span>
			<select name="status"  class="form-control">
				<option value="<?php echo e($marca->status); ?>"><?php echo e($marca->status); ?></option>
				<option value="ativo">Ativo</option> 
				<option value="Inativo">Inativo</option>

			</select>

		</div>
		
		<div class="form-group">
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/marca';">Cancelar</button>
		</div>

		<?php echo Form::close(); ?>		
		
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>