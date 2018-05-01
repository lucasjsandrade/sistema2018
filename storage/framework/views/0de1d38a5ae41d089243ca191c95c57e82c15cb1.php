<?php echo Form::open(array('url'=>'pessoa/fornecedor', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')); ?> <!--Comando para inicializar um formulario, coloca array porque vai abrir uma lista de repetição-->

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Consultar" value="<?php echo e($searchText); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Consultar</button>
		</span>
	</div>
</div>

<?php echo e(Form::close()); ?>