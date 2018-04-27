@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar Categoria: {{ $categoria->nome }}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($categoria, ['method'=>'PUT', 'route'=>['categoria.update', $categoria->idcategoria]])!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nome">Nome</label>
			<span class="ob">*</span>
			<input type="text" name="nome" required class="form-control" 
			value="{{ $categoria->nome }}"
			placeholder="Nome...">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição</label>
			<span class="ob">*</span>
			<input type="text" name="descricao" required class="form-control"
			value="{{ $categoria->descricao }}"
			placeholder="Descrição...">
		</div>

		<div class="form-group">
			<label for="status">Status</label>
			<span class="ob">*</span>
			<select name="status"  class="form-control">
				<option value="{{$categoria->status}}">{{$categoria->status}}</option>
				<option value="ativo">Ativo</option> 
				<option value="Inativo">Inativo</option>

			</select>

		</div>

		<div class="form-group">
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/categoria';">Cancelar</button>

			{!!Form::close()!!}		
			
		</div>
	</div>
	@stop