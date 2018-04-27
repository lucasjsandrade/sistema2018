@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Agendamento Orçamento</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

	</div>
</div>


{!!Form::open(array('url'=>'venda/agendamento','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
{{Form::token()}}

<div class="row">

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label>Cliente</label>
			<span class="ob">*</span>
			<select name="idcliente" class="form-control">
				@foreach($cliente as $cli)
				<option value="{{$cli->idcliente}}">
					{{$cli->nomeCliente}}
				</option>
				@endforeach
			</select>
		</div>

	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label>Funcionario</label>
			<span class="ob">*</span>
			<select name="idfuncionario" class="form-control">
				@foreach($funcionario as $fun)
				<option value="{{$fun->idfuncionario}}">
					{{$fun->nomeFuncionario}}
				</option>
				@endforeach
			</select>
		</div>

	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="dataOrcamento">Data Orcamento</label>
			<input type="date" name="dataOrcamento" value="{{old('dataOrcamento')}}" class="form-control">			
		</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="dataInstalacao">Data Instalação</label>
			<input validaData type="date" name="dataInstalacao" value="{{old('dataInstalacao')}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="horaMarcada">Hora marcada</label>
			<span class="ob">*</span>
			<input type="time" required name="horaMarcada"  value="{{old('horaMarcada')}}" class="form-control" maxlength="8" name="hour" pattern="[0-9]{2}:[0-9]{2} [0-9]{2} $" min="08:00" max="18:00">		
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="status">Status</label>
			<span class="ob">*</span>
			<select name="status" id="status" class="form-control">
				<option value="Orcamento">Orçamento</option> 
				<option value="Agendamento">Instalação</option>
				<option value="Agendamento">Concluido</option>
			</select>
		</div>
	</div>


	<div class="col-lg-7 col-sm-6 col-xs-12"> 
		<div class="form-group"><br>
			<button class="btn btn-primary" type="submit">Salvar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/venda/agendamento';">Cancelar</button>  

		</button><a href=/pessoa/funcionario/create target="_blank"><button class="btn btn-primary" type="button" 
			">Novo Funcionario </button></a>

		</button><a href=/pessoa/cliente/create target="_blank"><button class="btn btn-primary" type="button"
			">Novo Cliente </button></a>



			{!!Form::close()!!}		

			@stop