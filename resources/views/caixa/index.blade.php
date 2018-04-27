@extends('layouts.admin')
@section('conteudo')
<div class="row">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>

						<th>Data</th>

						<th>descricao</th>
						<th>Tpo Movimentacao</th>
						<th>Valor</th>

						<th>Total</th>

						<th>Opções</th>



					</thead>



					@foreach ($caixa as $c)
					<tr>
						<td>{{ $c->data}}</td>					
						<td>{{ $c->tipoMovimentacao}}</td>					
						<td>{{ $c->valor}}</td>	

						<!---->








						<td>
							<a href="{{URL::action('VendaController@show',$v->idvenda)}}"><button class="btn btn-info">Detalhe</button></a>
						</td>


					</tr>

					@include('caixa.modal')
					@endforeach
				</table>

			</div>
			{{$caixa->render()}}
		</div>
	</div>
	@stop