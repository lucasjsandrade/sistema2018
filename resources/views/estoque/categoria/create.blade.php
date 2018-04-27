@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Cadastro de Categoria</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'estoque/categoria','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nome">Nome</label>
			<span class="ob">*</span>
			<input type="text" name="nome" required class="form-control" placeholder="Nome...">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição</label>
			<span class="ob">*</span>
			<input type="text" required name="descricao" class="form-control" placeholder="Descrição...">
		</div>
		<div class="form-group">
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/categoria';">Cancelar</button>
			
		</div>

		{!!Form::close()!!}		
		
	</div>
</div>
@stop