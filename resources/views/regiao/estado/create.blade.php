@extends('layouts.admin')
@section('conteudo')
<div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Cadastro Estado</h3>
      @if (count($errors)>0) <!-- Se existir erro vai mostrar um alerta e vai listar os erros --> 
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif



      {!!Form::open(array('url'=>'regiao/estado','method'=>'POST','autocomplete'=>'off'))!!}<!-- Metodo POST está passando informação -->
      {{Form::token()}}
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="nomeEstado">Nome</label>
            <span class="ob">*</span>
            <input type="text" name="nomeEstado" required class="form-control" placeholder="Nome do Estado...">
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="sigla">Sigla</label>
            <span class="ob">*</span>
            <input type="text" name="sigla" required class="form-control" placeholder="Sigla...">
         </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="form-group">
            <label>País</label>
            <span class="ob">*</span>
            <select name="idpais" class="form-control">
               @foreach($pais as $pai)
               <option value="{{$pai->idpais}}"><!-- Aqui vai recuperar o objeto do banco -->
                  {{$pai->nomePais}}
               </option>
               @endforeach
            </select>
         </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/estado';">Cancelar</button>
         </div>
         <button class="btn btn-primary" type="button" onclick="javascript: location.href='/regiao/pais/create';"> Novo País </button>



      </div>
   </div>

   {!!Form::close()!!}     

</div>
</div>
@stop