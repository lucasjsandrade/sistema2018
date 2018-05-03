@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar País: {{ $pais->nome }}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($pais, ['method'=>'PATCH', 'route'=>['pais.update', $pais->idpais]])!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nomePais">Nome do páis:</label>
			<input type="text" name="nomePais" class="form-control" 
			value="{{ $pais->nomePais }}"
			placeholder="Nomes...">
		</div>

		<div class="form-group">
			<label for="nome">Sigla:</label>
			<input type="text" name="sigla" class="form-control" 
			value="{{ $pais->sigla }}"
			placeholder="Sigla...">
		</div>
		<div class="form-group"> 
			<label for="status">Status:</label>
			<span class="ob">*</span>
			<select name="status"  class="form-control">
				<option value="{{$pais->status}}">{{$pais->status}}</option>
				<option value="ativo">Ativo</option> 
				<option value="Inativo">Inativo</option>

			</select>

		</div>

		<div class="form-group">
			<button class="btn btn-success" type="submity">Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/pais';">Cancelar</button>
		</div>

		{!!Form::close()!!}		

	</div>
</div>
@stop