@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Categoria   <a href="categoria/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('estoque.categoria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Status</th>
					<th>Opções</th>
				</thead>
				@foreach ($categoria as $cat)
				<tr>
					<td>{{ $cat->idcategoria}}</td>
					<td>{{ $cat->nome}}</td>
					<td>{{ $cat->descricao}}</td>
					<td>{{ $cat->status}}</td>

					<td>
						<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('estoque.categoria.modal')
				@endforeach
			</table>
		</div>
		{{$categoria->render()}}
	</div>
</div>
@stop