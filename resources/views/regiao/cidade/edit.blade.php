@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Alterar Cidade: {{ $cidade->nomeCidade }}</h3>
   @if (count($errors)>0)
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {!!Form::model($cidade, ['method'=>'PUT', 'route'=>['cidade.update', $cidade->idcidade]])!!}
  {{Form::token()}}

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
     <label for="nome">Nome da Cidade</label>
     <span class="ob">*</span>
     <input type="text" name="nomeCidade" class="form-control" 
     value="{{ $cidade->nomeCidade }}"
     placeholder="Nome cidade...">
   </div>
  </div>

<<<<<<< HEAD
    <option value="{{$est->idestado}}" selected><!-- Aqui vai recuperar o objeto do banco -->
      {{$est->nomeEstado}}
    </option>
    @else
    <option value="{{$est->idestado}}">
      {{$est->nomeEstado}}
    </option>
    @endif
    @endforeach
  </select>
</div>
=======
 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
   <div class="form-group">
    <label>Estado</label>
    <select name="idestado" class="form-control">
      <span class="ob">*</span>
      @foreach($estado as $est)
      @if($est->idestado==$cidade->idestado)
      <option value="{{$est->idestado}}" selected><!-- Aqui vai recuperar o objeto do banco -->
        {{$est->nomeEstado}}
      </option>
      @else
      <option value="{{$est->idestado}}">
        {{$est->nomeEstado}}
      </option>
      @endif
      @endforeach
    </select>
  </div>
 </div>

 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
         <div class="form-group">
             <a href=/regiao/estado/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/> Novo estado </button></a>
         </div>
  </div>


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
      <label for="status">Status</label>
      <span class="ob">*</span>
      <select name="status"  class="form-control">
        <option value="{{$cidade->status}}">{{$cidade->status}}</option>
        <option value="ativo">Ativo</option> 
        <option value="Inativo">Inativo</option>
      </select>
    </div>
  </div>

  

>>>>>>> b0783e846d64c9e6259472f7d99dc1bc45f98431
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
   <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/cidade';">Cancelar</button>   
 </div>
</div>

</div>

</div>

{!!Form::close()!!}		

</div>
</div>
@stop