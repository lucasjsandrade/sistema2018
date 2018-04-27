<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-confirmar-{{$v->idvenda}}">
{{Form::Open(array('action'=>array('VendaController@store',$v->idvenda),'method'=>'confirm'))}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" 
			aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
			<div class="form-group">
				<label for="condicaoPagamento">Condição Pagamento</label>
				<span class="ob">*</span>
				<select name="condicaoPagamento" id="condicaoPagamento" value="{{old('condicaoPagamento')}}"
				id="condicaoPagamento" class="form-control">

				<option value="Avista">Avista </option>
				<option value="Aprazo">A prazo </option>



			</select>

		</div>
	</div>

	<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
		<div class="form-group">
			<span class="ob">*</span>
			<label>Forma Pagamento</label>
			<select name="formaPagamento" id="formaPagamento" class="form-control">

				<option value="Dinheiro">Dinheiro </option>
				<option value="Boleto"> Boleto </option>
				<option value="Cartão">Cartão </option>
				<option value="Cartão">Cheque </option>


			</select>
		</div>

	</div>
	div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
	<div class="form-group">
		<span class="ob">*</span>
		<label>Numero De parcelas</label>
		<select name="numeroDeParcelas" id="numeroDeParcelas" class="form-control">

			<option value=1>1x </option>
			<option value=2>2x </option>
			<option value=3>3x </option>
			<option value=4>4x </option>
			<option value=5>5x </option>
			<option value=6>6x </option>
			<option value=7>7x </option>
			<option value=8>8x </option>
			<option value=9>9x </option>
			<option value=10>10x </option>

			

		</select>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	<button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
</div>
</div>
</div>
{{Form::Close()}}

</div>