<?php echo Form::open(array('url'=>'regiao/pais', 'method'=>'GET', 'autocomplete'=>'off', 'role' => 'search')); ?>


<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="consultar..." value="<?php echo e($searchText); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Consultar</button>
		</span>
	</div>
</div>

<?php echo e(Form::close()); ?> 