<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-<?php echo e($c->idcontasr); ?>">
<?php echo e(Form::Open(array('action'=>array('ContasreceberController@destroy',$c->idcontasr),'method'=>'delete'))); ?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" 
			aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<h4 class="modal-title">Deletar a conta a receber?</h4>
	</div>
	<div class="modal-body">
		<p>Confirme se deseja delerar a conta a pagar...</p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		<button type="submit" class="btn btn-primary">Confirmar</button>
	</div>
</div>
</div>
<?php echo e(Form::Close()); ?>


</div>