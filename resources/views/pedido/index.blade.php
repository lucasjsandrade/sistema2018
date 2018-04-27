@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Pedidos <a href="pedido/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('pedido.search')
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
				@foreach ($pedido as $ped)
				<tr>
					
					<td>{{ converteData ($ped->dataPedido)}}</td>
					<td>{{ $ped->idpedido}}</td>
					<td>{{ $ped->nomeFantasia}}</td>
					
					

					
					<td>{{ $ped->status}}</td>
					
					
					

					<td>
						<a href="{{URL::action('PedidoController@show',$ped->idpedido)}}"><button class="btn btn-info">Detalhes</button></a>
						<a href="" data-target="#modal-delete-{{$ped->idpedido}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>

					</td> 


				</tr>

				@include('pedido.modal')
				@endforeach
			</table>

		</div>
		{{$pedido->render()}}
	</div>
</div>
@stop