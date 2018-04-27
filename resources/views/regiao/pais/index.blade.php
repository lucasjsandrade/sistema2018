@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Pais <a href="pais/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('regiao.pais.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Pais</th>
					<th>Nome</th>
					<th>Sigla</th>
					
				</thead>
               @foreach ($pais as $pai)
				<tr>
					<td>{{ $pai->idpais}}</td>
					<td>{{ $pai->nomePais}}</td>
					<td>{{ $pai->sigla}}</td>
					<td>{{ $pai->status}}</td>
					
					<td>
						<a href="{{URL::action('PaisController@edit',$pai->idpais)}}"><button class="btn btn-info">Alterar</button></a>
                         <a href="" data-target="#modal-delete-{{$pai->idpais}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>


                
					</td>
				</tr>
				@include('regiao.pais.modal')
				@endforeach
			</table>
		</div>
		{{$pais->render()}}
	</div>
</div>
@stop