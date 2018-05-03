@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Cidade <a href="cidade/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('regiao.cidade.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código da Cidade</th>
					<th>Nome Cidade</th>
					<th>Nome Estado</th>
					<th>Nome Pais</th>
					<th>Status</th>

					<th>Pais</th>
				</thead>
               @foreach ($cidade as $cid)
				<tr>
					<td>{{ $cid->idcidade}}</td>
					<td>{{ $cid->nomeCidade}}</td>
					<td>{{ $cid->nomeEstado}}</td>
					<td>{{ $cid->nomePais}}</td>
					<td>{{ $cid->status}}</td>
				
					<td>
						<a href="{{URL::action('CidadeController@edit',$cid->idcidade)}}"><button class="btn btn-info">Alterar</button></a>
                         <a href="" data-target="#modal-delete-{{$cid->idcidade}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('regiao.cidade.modal')
				@endforeach
			</table>
		</div>
		{{$cidade->render()}}
	</div>
</div>
@stop