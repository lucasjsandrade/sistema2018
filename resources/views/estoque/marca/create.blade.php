@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Cadastro Marca</h3>
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

{!!Form::open(array('url'=>'estoque/marca','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label for="nome">Nome</label>
			<span class="ob">*</span>
			<input type="text" name="nome" required="" class="form-control" placeholder="Nome...">
		</div>
	</div>
	
	
	<div class="col-lg-12 col-sm-12 col-xs-12"> 
		<div class="form-group"><br>
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
			<button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button>  
			<label class="pull-right">Campo com '<span class="ob">*</span>' obrigatório</label>
		</div> 
	</div>

	{!!Form::close()!!}		
	
</div>
</div>
@stop