@extends('layouts.admin')
@section('conteudo')
<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Cadastro de País</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                  <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                  </ul>
            </div>
            @endif

            {!!Form::open(array('url'=>'regiao/pais','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                  <label for="nomePais">Nome do país</label>
                  <input type="text" name="nomePais" class="form-control" placeholder="Nome país..">
            </div>

            <div class="form-group">
                  <label for="sigla">Sigla</label>
                  <input type="text" name="sigla" class="form-control" placeholder="Sigla...">
            </div>
            
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Confirmar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
                  
            </div>

            {!!Form::close()!!}           
            
      </div>
</div>
@stop