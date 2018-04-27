{!!Form::open(array('url'=>'venda/orcamento', 'method'=>'GET', 'autocomplete'=>'off', 'role' => 'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Consultar o numero do orçamento." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Consultar</button>
		</span>
	</div>
</div>

{{Form::close()}}