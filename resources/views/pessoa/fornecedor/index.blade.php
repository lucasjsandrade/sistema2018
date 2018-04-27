@extends('layouts.admin')
@section('conteudo')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fornecedor <a href="fornecedor/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('pessoa.fornecedor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Razão Social</th>
					<th>Nome Fantasia</th>
					<th>CNPJ</th>
					<th>Telefone</th>
					<th>E-mail</th>
					<th>Logradouro</th>
					<th>Cidade</th>
					<th>status</th>														
				</thead>
				@foreach ($fornecedor as $for)
				<tr>
					<td>{{$for->idfornecedor}}</td>
					<td>{{$for->razaoSocial}}</td>
					<td>{{$for->nomeFantasia}}</td>
					<td>{{$for->cnpj}}</td>
					<td>{{$for->telefone}}</td>
					<td>{{$for->email}}</td>					
					<td>{{$for->logradouro}}</td>					
					<td>{{$for->cidade}}</td>														
					<td>{{$for->status}}</td>														
					
					<td>
						
						<a href="{{URL::action('fornecedorController@edit',$for->idfornecedor)}}"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-{{$for->idfornecedor}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('pessoa.fornecedor.modal')
				@endforeach
			</table>
		</div>
		{{$fornecedor->render()}}
	</div>
</div>

@stop