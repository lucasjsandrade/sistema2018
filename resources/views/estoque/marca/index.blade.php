@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Marcas   <a href="marca/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('estoque.marca.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nome</th>
					<th>Status</th>
					
				</thead>
				@foreach ($marca as $mar)
				<tr>
					<td>{{ $mar->codigo}}</td>
					<td>{{ $mar->nome}}</td>
					<td>{{ $mar->status}}</td>
					
					<td>
						<a href="{{URL::action('MarcaController@edit',$mar->codigo)}}"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-{{$mar->codigo}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>


						
					</td>
				</tr>
				@include('estoque.marca.modal')
				@endforeach
			</table>
		</div>
		{{$marca->render()}}
	</div>
</div>
@stop