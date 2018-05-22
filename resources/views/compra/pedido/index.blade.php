@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Pedidos de compra <a href="/compra/pedido/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('compra.pedido.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					<!--<th>ID:Fucionario</th>-->
					<th>Numero do Pedido</th>
					<th>ID:Fornecedor</th>
                    <!--<th>Produto</th>
                    <th>Medida</th>
					<th>Quantidade</th>
					<th>Valor Unitario</th> -->
					
					
					<th>status</th>
					<!--<th>Forma Pagamento</th>
						<th>Condicao Pagamento</th> -->

						<th>Opções</th>



					</thead>

					<?php
					function converteData($data){
						return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
					}
					?>
					@foreach ($compra as $comp)
					<tr>

						<td>{{ converteData ($comp->dataCompra)}}</td>
						<td>{{ $comp->idcompra}}</td>
						<td>{{ $comp->nomeFantasia}}</td>




						<td>{{ $comp->status}}</td>




						<td>
							<a href="{{URL::action('PedidoController@show',$comp->idcompra)}}"><button class="btn btn-info">Detalhe</button></a>						 
							<a href="{{URL::action('PedidoController@edit',$comp->idcompra)}}"><button type="submit" class="btn btn-info">Alterar</button></a>
							<a href="{{URL::action('PedidoController@edit',$comp->idcompra)}}"><button type="submit" class="btn btn-info">Finalizar Compra</button></a>
						</td> 


					</tr>


					@endforeach
				</table>

			</div>
			{{$compra->render()}}
		</div>
	</div>
	@stop