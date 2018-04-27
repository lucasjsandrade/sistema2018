@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>CONTAS A PAGAR   <a href="contaspagar/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('contaspagar.search')
	</div>
</div>
<?php
function converteData($data){
	return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Data</th>
					<th>Valor</th>
					<th>Descricao</th>
					<th>N de parcela</th>
					<th>Id-Compra</th>
					<th>Id-Fornecedor</th>
				</thead>
				@foreach ($contaspagar as $c)
				<tr>
					<td>{{ $c->idcontasp}}</td>
					<td>{{converteData( $c->data)}}</td>
					<td>{{ $c->valor}}</td>
					<td>{{ $c->descricao}}</td>
					<td>{{ $c->numeroDeParcelas}}</td>
					<td>{{ $c->idcompra}}</td>
					<td>{{ $c->idfornecedor}}</td>
					
					
					<td>
						<a href="{{URL::action('ContaspagarController@show',$c->idcontasp)}}"><button class="btn btn-info">Mostrar</button></a>
						<a href="{{URL::action('desenvolvimentoController@index')}}"><button class="btn btn-info">Alterar</button></a>
						<a href="" data-target="#modal-delete-{{$c->idcontasp}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('contaspagar.modal')
				@endforeach
			</table>
		</div>

		{{$contaspagar->render()}}
	</div>
</div>
@stop