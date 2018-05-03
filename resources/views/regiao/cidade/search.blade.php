{!!Form::open(array('url'=>'regiao/cidade', 'method'=>'GET', 'autocomplete'=>'off', 'role' => 'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Consultar cidade..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Consultar</button>
		</span>
	</div>
</div>

{{Form::close()}} 