@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar Marca: {{ $marca->nome }}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($marca, ['method'=>'PATCH', 'route'=>['marca.update', $marca->codigo]])!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nome">Nome</label>
			<span class="ob">*</span>
			<input type="text" name="nome" required class="form-control" 
			value="{{ $marca->nome }}"
			placeholder="Nome...">
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<span class="ob">*</span>
			<select name="status"  class="form-control">
				<option value="{{$marca->status}}">{{$marca->status}}</option>
				<option value="ativo">Ativo</option> 
				<option value="Inativo">Inativo</option>

			</select>

		</div>
		
		<div class="form-group">
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/marca';">Cancelar</button>
		</div>

		{!!Form::close()!!}		
		
	</div>
</div>
@stop