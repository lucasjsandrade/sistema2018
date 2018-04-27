@extends('layouts.admin')
@section('conteudo')
<div class="row"
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Lista de Agendamento <a href="agendamento/create"><button class="btn btn-success">Incluir</button></a></h3>
	@include('venda.agendamento.search')
</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive form-group">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>				
					
					<th>Funcionario</th>
					<th>Cliente</th>					
					<th>Telefone</th>
					<th>Data de Lançamento</th>
					<th>Data de Orçamento</th>					
					<th>Data de Instalação</th>
					<th>Status</th>
					<th>Hora marcada</th>
					
				</thead>

				<?php
				function converteData($data){
					return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
				}
				?>


				@foreach ($agendamento as $agen)    

				<tr>
					
					<td>{{ $agen->funcionario}}</td>
					<td>{{ $agen->cliente}}</td>					
					<td>{{ $agen->telefone}}</td>
					<td>{{ converteData($agen->dataLancamento)}}</td>
					<td>{{ converteData($agen->dataOrcamento)}}</td>					
					<td>{{ converteData($agen->dataInstalacao)}}</td>
					<td>{{ $agen->status}}</td>
					<td>{{ $agen->horaMarcada}}</td>
					
					<td>
						<a href="{{URL::action('agendamentoController@edit',$agen->idagendamento)}}"><button class="btn btn-info">alterar</button></a>
						<a href="" data-target="#modal-delete-{{$agen->idagendamento}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('venda.agendamento.modal')
				@endforeach
			</table>
		</div>
		{{$agendamento->render()}}
	</div>
</div>
@stop