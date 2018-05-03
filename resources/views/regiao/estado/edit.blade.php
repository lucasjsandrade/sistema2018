@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Alterar Estado: {{ $estado->nomeEstado }}</h3>
   @if (count($errors)>0)
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach 
    </ul>
  </div>
  @endif


  {!!Form::model($estado, ['method'=>'PATCH', 'route'=>['estado.update', $estado->idestado]])!!}
  {{Form::token()}}

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="form-group">
     <label for="nomeEstado">Nome do Estado</label>
     <span class="ob">*</span>
     <input type="text" name="nomeEstado" required class="form-control" 
     value="{{ $estado->nomeEstado }}"
     placeholder="Nome Do Estado...">
   </div>
 </div>

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="form-group">
     <label for="sigla">Sigla</label>
     <span class="ob">*</span>
     <input type="text" name="sigla" required class="form-control" 
     value="{{ $estado->sigla }}"
     placeholder="Sigla...">
   </div>
 </div>

 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"> 
 <div class="form-group">
  <label>Pais</label>
  <span class="ob">*</span>
  <select name="idpais" class="form-control">
    @foreach($pais as $pai)
    <option value="{{$pai->idpais}}">
      {{$pai->nomePais}}
    </option>
    @endforeach
  </select>
</div>
</div>


<div class="col-lg-1 col-sm-1 col-xs-1">
         <div class="form-group">
             <a href=/regiao/pais/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/>  Novo pais </button></a>
         </div>
       </div>

 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
     <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
     <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/estado';">Cancelar</button>    
    </div>
 </div>


{!!Form::close()!!}		


@stop