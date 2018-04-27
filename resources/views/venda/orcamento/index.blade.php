@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Novo Orcamento <a href="/venda/orcamento/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('venda.orcamento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					
					<th>Numero do Orçamento</th>
					<th>Fucionario  : cod</th>
					<th>Cliente   : cod</th>
					
					<th>status</th>			

					<th>Opções</th>
					
					
					
				</thead>

				

				@foreach ($orcamento as $o)
				<tr>
					<td>{{ $o->dataOrcamento}}</td>
					<td>{{ $o->idorcamento}}</td>					
					<td>{{ $o->nomeFuncionario." : ".$o->idfuncionario}}</td>					
					<td>{{ $o->nomeCliente." :     ".$o->idcliente}}</td>					
					<td>{{ $o->status}}</td>
					



					<td>
						<a href="{{URL::action('orcamentoController@show',$o->idorcamento)}}"><button class="btn btn-info">Detalhe</button></a>
						 
						<a href="{{URL::action('orcamentoController@edit',$o->idorcamento)}}"><button type="submit" class="btn btn-info">Alterar</button></a>
						 
					</td>



				</tr>

				
				@endforeach
			</table>

		</div>
		{{$orcamento->render()}}
	</div>
</div>
@stop