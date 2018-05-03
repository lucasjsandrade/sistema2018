<?php $__env->startSection('conteudo'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar País: <?php echo e($pais->nome); ?></h3>
		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php echo Form::model($pais, ['method'=>'PATCH', 'route'=>['pais.update', $pais->idpais]]); ?>

		<?php echo e(Form::token()); ?>


		<div class="form-group">
			<label for="nomePais">Nome do páis:</label>
			<input type="text" name="nomePais" class="form-control" 
			value="<?php echo e($pais->nomePais); ?>"
			placeholder="Nomes...">
		</div>

		<div class="form-group">
			<label for="nome">Sigla:</label>
			<input type="text" name="sigla" class="form-control" 
			value="<?php echo e($pais->sigla); ?>"
			placeholder="Sigla...">
		</div>
<<<<<<< HEAD
=======
		<div class="form-group"> 
			<label for="status">Status:</label>
			<span class="ob">*</span>
			<select name="status"  class="form-control">
				<option value="<?php echo e($pais->status); ?>"><?php echo e($pais->status); ?></option>
				<option value="ativo">Ativo</option> 
				<option value="Inativo">Inativo</option>

			</select>

		</div>
>>>>>>> b0783e846d64c9e6259472f7d99dc1bc45f98431

		<div class="form-group">
			<button class="btn btn-success" type="submity">Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/pais';">Cancelar</button>
		</div>

		<?php echo Form::close(); ?>		

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>