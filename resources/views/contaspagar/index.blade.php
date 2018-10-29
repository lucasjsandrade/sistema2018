@extends('layouts.admin')
@section('conteudo')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>CONTAS A PAGAR  </h3>
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
					<th>N° de parcela</th>
					<th>N° Compra</th>
					<th>N° Fornecedor</th>
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
					
					</td>
				</tr>

				@endforeach
			</table>
		</div>

		{{$contaspagar->render()}}
	</div>
</div>
@stop