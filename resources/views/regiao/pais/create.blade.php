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
</div>
</div>


            {!!Form::open(array('url'=>'regiao/pais','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                              <label for="nomePais">Nome do país</label>
                              <span class="ob">*</span>
                              <input type="text" name="nomePais" class="form-control" placeholder="Nome país..">
                        </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                              <label for="sigla">Sigla</label>
                              <span class="ob">*</span>
                              <input type="text" name="sigla" class="form-control" placeholder="Sigla...">
                        </div>
                  </div>

            </div>
            
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Confirmar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
                  <label class="pull-right">Campo com '<span class="ob">*</span>' obrigatório</label>
            </div>

            {!!Form::close()!!}           
            
      </div>
</div>
@stop