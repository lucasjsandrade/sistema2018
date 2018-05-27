@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Novo Orcamento de Venda <a href="/venda/orcamento/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('venda.orcamento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					
					<th>N°: Orçamento</th>
					<th>Fucionario  : cod</th>
					<th>Cliente   : cod</th>					
					<th>Status</th>	
					<th>Total</th>					
					<th>Opções</th>					
				</thead>

				<?php
				function converteData($data)
				{
					return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
				}
				?>

				@foreach ($venda as $o)
				<tr>
					<td>{{ converteData ($o->dataVenda)}}</td>
					<td>{{ $o->idvenda}}</td>					
					<td>{{ $o->nomeFuncionario." : ".$o->idfuncionario}}</td>					
					<td>{{ $o->nomeCliente." :     ".$o->idcliente}}</td>					
					<td>{{ $o->status}}</td>
					<td>{{$o->valorTotal}}</td>

					<td>
						<a href="{{URL::action('orcamentoController@show',$o->idvenda)}}"><button class="btn btn-info">Detalhe</button></a>						 
						<a href="{{URL::action('orcamentoController@edit',$o->idvenda)}}"><button type="submit" class="btn btn-primary">Alterar</button></a>
												

						
						<a href="" data-target="#modal-delete-{{$o->idvenda}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
						
						</td>

					</td>
				</tr>

				
				@endforeach
			</table>

		</div>
		{{$venda->render()}}
	</div>
</div>
@stop