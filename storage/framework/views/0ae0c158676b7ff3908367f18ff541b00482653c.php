<?php $__env->startSection('conteudo'); ?>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Cliente</h3>
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

			<?php echo Form::open(array('url'=>'venda/cliente','method'=>'POST','autocomplete'=>'off')); ?>

            <?php echo e(Form::token()); ?>

           

            <div class="row">
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
	            	<div class="form-group">
	            	<label for="nome">Nome</label>
	            	<input type="text" name="nome" required value="<?php echo e(old('nome')); ?>" class="form-control" placeholder="Nome...">
	            	</div>
            	</div>

            	

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            		<label>Tipo Documento</label>
            		<select name="tipo_documento" class="form-control">
	            		
	            		<option value="CPF"> CPF </option>
	            		<option value="RG">RG </option>

	            		
            		</select>
            		</div>
            		
            	</div>

            		
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="num_doc">Número Documento</label>
	            	<input type="text" name="num_doc" required value="<?php echo e(old('num_doc')); ?>" class="form-control" placeholder="Número do Documento...">
	            	</div>
            		
            	</div>
            		
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="endereco">Endereço</label>
	            	<input type="text" name="endereco" required value="<?php echo e(old('endereco')); ?>" class="form-control" placeholder="Endereço...">
	            	</div>	
            		
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
            	<label for="telefone">Telefone</label>
            	<input type="text" name="telefone" class="form-control" placeholder="Telefone...">
            		</div>
            		
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" 
            	class="form-control" placeholder="Email...">
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