@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Compra <a href="compra/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('compra.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Data</th>
					
					<th>Numero da Compra</th>
					<th>ID:Fucionario</th>
					<th>ID:Fornecedor</th>
                    <!--<th>Produto</th>
                    
					<th>Quantidade</th>
					<th>Valor Unitario</th> -->
					
					
					<th>status</th>
					<!--<th>Forma Pagamento</th>
					<th>Condicao Pagamento</th> -->

					<th>Total</th>

					<th>Opções</th>
					
					
					
				</thead>

				

				@foreach ($compra as $com)
				<tr>
					
					<td>{{ $com->dataCompra}}</td>
					<td>{{ $com->idcompra}}</td>
					<td>{{ $com->nomeFuncionario}}</td>
					<td>{{ $com->nomeFantasia}}</td>
					<td>{{ $com->status}}</td>
					<td>{{ $com->totalCompra}}</td>
					<!---->
					
					
					

					
					
					

					<td>
						<a href="{{URL::action('CompraController@show',$com->idcompra)}}"><button class="btn btn-info">Detalhe</button></a>
						</td>


				</tr>

				@include('compra.modal')
				@endforeach
			</table>

		</div>
		{{$compra->render()}}
	</div>
</div>
@stop