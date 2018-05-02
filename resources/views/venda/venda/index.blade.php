@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nova Venda <a href="/venda/venda/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('venda.venda.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>					
					<th>Data</th>					
					<th>Numero da Venda</th>
					<th>ID:Fucionario</th>
					<th>ID:Cliente</th>  
					<th>status</th>					
					<th>Total</th>
					<th>Opções</th>					
				</thead>

				 <?php
			        function converteData($data)
			        {
			          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
			        }
			      ?>

				@foreach ($venda as $v)
				<tr>
					<td>{{ converteData ($v->dataVenda)}}</td>
					<td>{{ $v->idvenda}}</td>					
					<td>{{ $v->idfuncionario}}</td>					
					<td>{{ $v->idcliente}}</td>					
					<td>{{ $v->status}}</td>
					<td>{{ $v->valorTotal}}</td>

					<!---->
					
					
					

					
					
					

					<td>
						<a href="{{URL::action('VendaController@show',$v->idvenda)}}"><button class="btn btn-info">Detalhe</button></a>
						</td>


				</tr>

				@include('venda.venda.modal')
				@endforeach
			</table>

		</div>
		{{$venda->render()}}
	</div>
</div>
@stop